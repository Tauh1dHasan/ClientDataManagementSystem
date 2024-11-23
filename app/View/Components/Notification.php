<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Notification as DataNotification;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(auth()->user()->role_id > 1){
            $notifications = DataNotification::where('user_id', auth()->user()->id)->where('status', 0)->latest()->paginate(5);
        }else{
            $notifications = DataNotification::where('status', 0)->latest()->get();
        }
        return view('components.notification', compact('notifications'));
    }
}