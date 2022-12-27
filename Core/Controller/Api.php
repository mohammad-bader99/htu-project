<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Transaction;
use Core\Model\Item;
use Core\Model\Reletional;

class Api extends Controller
{

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true, // to provide the response status.
                "message_code" => "", // to provide message code for the front-end developer for a better error handling
                "body" => []
        );

        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));
        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }

        // function posts()
        // {
        //         try {
        //                 $post = new Post;
        //                 $posts = $post->get_all();
        //                 if (empty($posts)) {
        //                         throw new \Exception('No posts were found!');
        //                 }
        //                 $this->response_schema['body'] = $posts;
        //                 $this->response_schema['message_code'] = "posts_collected_successfuly";
        //         } catch (\Exception $error) {
        //                 $this->response_schema['success'] = false;
        //                 $this->response_schema['message_code'] = $error->getMessage();
        //                 $this->http_code = 404;
        //         }
        // }

        // function posts_create()
        // {
        //         self::check_if_empty($this->request_body);
        //         try {
        //                 $post = new Post;
        //                 $post->create($this->request_body);
        //                 $this->response_schema['message_code'] = "post_created_successfuly";
        //         } catch (\Exception $error) {
        //                 $this->response_schema['message_code'] = "post_was_not_created";
        //                 $this->http_code = 421;
        //         }
        // }

        function get_transaction()
        {
                try {
                        //$user_record=array();
                        $transaction=new Transaction;
                        $reletion=$transaction->get_by_user_id($this->request_body);
                        
                        foreach ($reletion as $value) {
                               $user_record[]=$transaction->get_by_transaction_id($value->transaction_id);
                        }

                        $this->response_schema['body']=$user_record;

                        $this->response_schema['message_code'] = "successful";
                        } catch (\Exception $error) {
                                        $this->response_schema['message_code'] = "not_successful";
                                        $this->http_code = 421;
                                }
        }
        
        function create_transaction()
        {
                        $item=new Item();
                        $item_data= $item->get_by_name($this->request_body['item_name']);
                if($item_data->quantity>=$this->request_body['item_quantity'] && $this->request_body['item_quantity']!=0)
                {
                    $_SESSION['qty_error']="false";
                        try {   
                            
                            
                            $transaction_data=array(
                                "item_id"=>$item_data->id,
                                "item_qty"=>$this->request_body['item_quantity'],
                                "item_price"=>$item_data->selling_price,
                                "total"=>$item_data->selling_price * $this->request_body['item_quantity']
                            );

                            $transaction = new Transaction;
                            $transaction_id= $transaction->create($transaction_data);
                            $user_id=$_SESSION['user']['id'];
                            
                            $reletional=new Reletional;
                            $reletional->create_by_sql("INSERT INTO `reletional`(`transaction_id`, `user_id`) VALUES ($transaction_id,$user_id)");

                            $new_quentity=array(
                                "id"=>$item_data->id,
                                "quantity"=>$item_data->quantity-$this->request_body['item_quantity']
                            );
                            $item->update($new_quentity); 
                            $this->response_schema['message_code'] = "transaction_created_successfuly";

                            } catch (\Exception $error) {
                                    $this->response_schema['message_code'] = "transaction_was_not_created";
                                    $this->http_code = 421;
                            }
                }
                else
                {
                    $_SESSION['qty_error']="true";
                }


        }
}
