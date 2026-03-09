<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MessageManager;
use App\Http\Requests\StoreContactMessageRequest;

class ContactMessageController extends Controller
{
    public function __construct(protected MessageManager $messageManager)
    {}

    public function index()
    {
        $messages = $this->messageManager->getAllMessagesForAdmin();
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function store(StoreContactMessageRequest $request)
    {
        $this->messageManager->storeNewMessage($request->validated());

        return redirect()->route('home')->with('success', 'تم إرسال رسالتك بنجاح. شكراً لتواصلك معنا!');
    }

    public function show($id)
    {
        $message = $this->messageManager->getMessageDetails($id);
        if (!$message) {
            return redirect()->route('admin.contact_messages.index')->with('error', 'الرسالة غير موجودة.');
        }

        return view('admin.contact_messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $this->messageManager->deleteMessage($id);
        return redirect()->route('admin.contact_messages.index')->with('success', 'تم حذف الرسالة بنجاح.');
    }
}
