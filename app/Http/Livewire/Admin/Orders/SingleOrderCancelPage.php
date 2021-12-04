<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\AdminNotification;
use App\Models\Order;
use Livewire\Component;

class SingleOrderCancelPage extends Component
{

    public function delete($id)
    {
        $odataItem = AdminNotification::find($id);
        if ($odataItem) {
            AdminNotification::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            return redirect(404);
        }
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Order::find($data);
        $adminNotification = AdminNotification::find($data);
        if ($action == 'message') {
            $this->dispatchBrowserEvent('openmodal');
            $this->emit('getModalId', $this->item);
        } elseif ($action == 'panding') { /* action where click status button */
            $newData->status = 1;
            $newData->customernotification = 1;
            $newData->save();
        } elseif ($action == 'processing') { /* action where click status button */
            $newData->status = 2;
            $newData->customernotification = 2;
            $newData->save();
            //a code for send mobile sms to confirm the customers customers
        } elseif ($action == 'cancel') { /* action where click status button */
            $newData->customernotification = 0;
            $newData->status = 3;
            $newData->save();
        } elseif ($action == 'complete') {
            $newData->customernotification = 1;
            $newData->status = 0;
            $newData->save();
        } elseif ($action == 'desableNotification') {
            $adminNotification->notification = 0;
            $adminNotification->save();
            $this->emit('refreshParent');
        } elseif ($action == 'enableNotification') {
            $adminNotification->notification = 1;
            $adminNotification->save();
            $this->emit('refreshParent');
        }
    }
    public function render()
    {
        return view('livewire.admin.orders.single-order-cancel-page', [
            'datas' => AdminNotification::where('message_for', 'orders_cancel')->orderBy('id', 'desc')->get(),
        ]);
    }
}
