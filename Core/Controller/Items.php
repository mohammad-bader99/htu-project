<?PHP

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Item;


/**
 * handle item operations
 */
class Items extends Controller
{
    private $user = null;


        /**
         * redirect the user
         *
         * @return void
         */
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        
        /**
         * display dashboard
         *
         * @return void
         */
        public function dashboard()
        {
            $item = new Item();
            $this->data=$item->get_all();
            $this->view="stock-dashboard";
        } 
    
        
        /**
         * display information of a single item
         *
         * @return void
         */
        public function single_item()
        {
            $item=new Item();
            $this->data=(array)$item->get_by_id($_GET['id']);
            $this->view="single-item";
        }
        

        /**
         * display update item form
         *
         * @return void
         */
        public function update_item_form()
        {
            $item=new Item();
            $this->data=(array)$item->get_by_id($_GET['id']);
            $this->view="update-item-form";
        }
        

        /**
         * update item information on the database
         *
         * @return void
         */
        public function update_item()
        {
            if(!empty($_FILES['file']['name']))
            {
                $name=explode('.',$_FILES['file']['name']);
                $_FILES['file']['name']=$name[0].'.png';
                $_POST=array(
                    'id'=>$_POST['id'],
                    'item_name'=>$_POST['item_name'],
                    'cost_price'=>$_POST['cost_price'],
                    'selling_price'=>$_POST['selling_price'],
                    'quantity'=>$_POST['quantity'],
                    'updated_by'=>$_POST['updated_by'],
                    'item_image'=> $_FILES['file']['name']
                );
            $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
            }
            $item=new Item();
            $item->update($_POST);
            Helper::redirect('stock-dashboard');
        }


        /**
         * delete item from the database
         *
         * @return void
         */
        public function delete_item()
        {
            $item=new Item();
            $item->delete($_GET['id']);
            Helper::redirect('stock-dashboard');
        }
        

        /**
         * display create item form
         *
         * @return void
         */
        public function create_item_form()
        {
            $this->view='create-item-form';
        }
        

        /**
         * create new item on the database
         *
         * @return void
         */
        public function create_item()
        {
            if(!empty($_POST))
            {
                    if(!empty($_FILES['file']['name']))
                {
                    $name=explode('.',$_FILES['file']['name']);
                    $_FILES['file']['name']=$name[0].'.png';
                    $_POST=array(
                        'item_name'=>$_POST['item_name'],
                        'cost_price'=>$_POST['cost_price'],
                        'selling_price'=>$_POST['selling_price'],
                        'quantity'=>$_POST['quantity'],
                        'updated_by'=>$_POST['updated_by'],
                        'item_image'=> $_FILES['file']['name']
                    );
                $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                }
                $item=new Item();
                $item->create($_POST);
            }
            Helper::redirect('stock-dashboard');
        }


        /**
         * display out of stock form
         *
         * @return void
         */
        public function out_of_stock()
        {
            $item= new Item();
            $this->data=$item->out_of_stock();
            $this->view="out-of-stock";
        }
        

        /**
         * display restock form
         *
         * @return void
         */
        public function restock()
        {
            $item= new Item();
            $this->data=$item->get_all();
            $this->view="restock";
        }
        

        /**
         * update single item quantity
         *
         * @return void
         */
        public function update_item_quantity()
        {
            $item=new Item;
            $item->update($_POST);
            $this->restock();
        }

}