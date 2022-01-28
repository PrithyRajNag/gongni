<?php
namespace App\Repositories;

use App\Jobs\sendSms;
use App\Models\People;
use App\Models\Sms;
use App\Models\SmsReceiver;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SmsRepository
{
    private $model;
    public function __construct(Sms $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        $receivers = [];


        if ($request->has('sms_to') && $request->get('sms_to') && $request->sms_to == 'people') {
            $receivers = People::pluck('phone_number');
            $this->model->receiver = 'All People';
        }
//        if ($request->has('sms_to') && $request->get('sms_to') && $request->sms_to == 'doctor') {
//            $receivers = User::pluck('phone_number');
//            $this->model->receiver = 'All Doctors';
//        }
        if ($request->has('sms_to') && $request->get('sms_to') && $request->sms_to == 'all') {
            $receivers = User::pluck('phone_number');
            $this->model->receiver = 'All Employees';
        }


        if ($request->has('sms_to') && $request->get('sms_to')
            && $request->sms_to == 'specific'
            && $request->has('receiver') && $request->get('receiver')) {
            $this->model->receiver = $request->sms_to;
            array_push($receivers, $request->receiver);
        }

        if ($request->has('message') && $request->get('message')) {
            $this->model->message = $request->message;
        }
//        return ["phone" => $receivers, "msg"=> $this->model->message];

//        $this->model->organization_id = auth()->user()->organization_id;
        $this->model->save();
        foreach ($receivers as $item) {
            $smsReceiver = new SmsReceiver();
            if ($receivers != null && $this->model->message != null) {

                    // save phone number with sms model id
                    $smsReceiver->sms_id = $this->model->id;
                    $smsReceiver->phone_number = $item;
    //                $smsReceiver->organization_id = auth()->user()->organization_id;
                    $smsReceiver->save();
                    // call sendSMS job
                    sendSms::dispatch($item, $this->model->message);

                }
        }
//        $smsReceiver = new SmsReceiver();
//        if ($receivers != null && $this->model->message != null) {
//            foreach ($receivers as $item){
//                // save phone number with sms model id
//                $smsReceiver->sms_id = $this->model->id;
//                $smsReceiver->phone_number = $item;
////                $smsReceiver->organization_id = auth()->user()->organization_id;
//                $smsReceiver->save();
//                // call sendSMS job
//                sendSms::dispatch($item, $this->model->message);
//            }
//
//
//        }

        return $smsReceiver;


    }
    public function update($request, $id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }



        return $item->save();
    }

    public function delete($id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }

        return $item->delete();
    }

}
