<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\SellerRequest;
use Illuminate\Http\Request;
use App\Models\User;
use function Webmozart\Assert\Tests\StaticAnalysis\false;

class SellerRequestController extends Controller
{
    public function deny(string $user_id)
    {
        $rst = SellerRequest::where('user_id', $user_id)->delete() ?? false;
        Notification::create([
            'title' => 'Request to be a Seller.',
            'description' => 'We are sorry to inform you that your apply for being a seller on the website was denied.',
            'user_id' => $user_id,
        ]);
        return $rst ? back()->with('success', 'Seller request denied, this user will be just a buyer.') : back()->with('error', 'error denying seller request.');
    }

    public function approve(string $user_id)
    {
        SellerRequest::where('user_id', $user_id)->delete();
        $user = User::find($user_id);
        $user->role = 'Seller';
        $user->save();
        Notification::create([
            'title' => 'Request to be a Seller.',
            'description' => 'We are happy to inform you that your request to be a seller with us is approved successfully, enjoy making new things here.',
            'user_id' => $user_id,
        ]);
        return back()->with('success', 'Seller request Approved successfully, this user now is a Seller on the website.');
    }
}
