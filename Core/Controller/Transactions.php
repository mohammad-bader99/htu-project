<?PHP

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\user;
use Core\Model\Reletional;
use Core\Model\Transaction;


/**
 * handle transaction operations
 */
class Transactions extends Controller
{


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
     * display selling dashboard
     *
     * @return void
     */
    public function selling_dashboard()
    {
        $this->view="selling-dashboard";
        $item=new Item;
        $this->data=$item->available_items();
    }
    

    /**
     * display user record form
     *
     * @return void
     */
    public function user_record()
    {
        $this->view="user-record";
    }
    

    /**
     * display all transactions from the database
     *
     * @return void
     */
    public function display_records()
    {
        $this->view="display-records";
        $transaction=new Transaction;
        $this->data=$transaction->get_all();
    }
    

    /**
     * delete record from the database
     *
     * @return void
     */
    public function delete_record()
    {
        Helper::redirect("/records-dashboard");

        $id=$_GET['id'];

        $transaction=new Transaction;
        $this->data=$transaction->delete($id);

        $reletional=new Reletional;
        $reletional->delete_by_sql("DELETE FROM `reletional` WHERE transaction_id=$id");
    }
    

    /**
     * display update record form
     *
     * @return void
     */
    public function update_record_form()
    {
        $transaction=new Transaction;
        $this->data=(array)$transaction->get_by_id($_GET['id']);
        $this->view="update-record-form";
    }
    

    /**
     * update record information on the database
     *
     * @return void
     */
    public function update_record()
    {
        $data=array(
            "id"=>$_POST['id'],
            "item_price"=>$_POST['selling_price'],
            "item_qty"=>$_POST['quantity'],
            "total"=>$_POST['selling_price']*$_POST['quantity']
        );
        $transaction=new Transaction;
        $transaction->update($data);
        Helper::redirect("/records-dashboard");
    }


    /**
     * display info dashboard
     *
     * @return void
     */
    public function info_dashboard()
    {
        $transaction=new Transaction;
        $item=new Item;
        $user=new User;

        $all_trns=$transaction->get_all();


        $trns_num=count($all_trns);

        $money=0;
        foreach ($all_trns as $trns) {
            $money+=$trns->total;
        }

        $all_items=$item->get_all();
        $items_qty=0;
        foreach ($all_items as $qty) {
            $items_qty+=$qty->quantity;
        }
        
        $users_qty=count($user->get_all());

        $sorted_items=$item->top_expensive();
        $i=1;
        $top_expensive=array();
        foreach ($sorted_items as $item) {
            if($i++>5)break;
            $top_expensive[]=$item;
        }


        $this->view="info-dashboard";
        $this->data=array(
            "money"=>$money,
            "transaction_rows"=>$trns_num,
            "items_qty"=>$items_qty,
            "users_qty"=>$users_qty,
            "top_expensive"=>$top_expensive
        );
    }



    /**
     * display single transaction information
     *
     * @return void
     */
    public function single_transaction()
    {
        $transaction=new Transaction;
        $this->data=(array)$transaction->get_by_id($_GET['id']);
        $this->view="single-record";
    }
}