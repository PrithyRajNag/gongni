<?php
namespace App\Repositories;

use App\Models\Ministry;
use App\Models\Tender;
use App\Models\TenderDocument;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TenderRepository
{
    private $model;
    public function __construct(Tender $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->paginate();
    }
    public function search($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->model
                ->where('entity_name', 'LIKE', "%$search%")
                ->orderBy('entity_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request)
    {
        if ($request->has('ministry_id') && $request->get('ministry_id')) {
            $this->model->ministry_id = $request->ministry_id;
        }
        if ($request->has('entity_name') && $request->get('entity_name')) {
            $this->model->entity_name = $request->entity_name;
        }
        if ($request->has('entity_code') && $request->get('entity_code')) {
            $this->model->entity_code = $request->entity_code;
        }
        if ($request->has('invitation_for') && $request->get('invitation_for')) {
            $this->model->invitation_for = $request->invitation_for;
        }
        if ($request->has('submission_date') && $request->get('submission_date')) {
            $this->model->submission_date = $request->submission_date;
        }
        if ($request->has('method') && $request->get('method')) {
            $this->model->method = $request->method;
        }
        if ($request->has('budget') && $request->get('budget')) {
            $this->model->budget = $request->budget;
        }
        if ($request->has('development_partner') && $request->get('development_partner')) {
            $this->model->development_partner = $request->development_partner;
        }
        if ($request->has('package_name') && $request->get('package_name')) {
            $this->model->package_name = $request->package_name;
        }
        if ($request->has('package_no') && $request->get('package_no')) {
            $this->model->package_no = $request->package_no;
        }
        if ($request->has('programme_name') && $request->get('programme_name')) {
            $this->model->programme_name = $request->programme_name;
        }
        if ($request->has('programme_code') && $request->get('programme_code')) {
            $this->model->programme_code = $request->programme_code;
        }
        if ($request->has('publish_date') && $request->get('publish_date')) {
            $this->model->publish_date = $request->publish_date;
        }
        if ($request->has('last_selling_date') && $request->get('last_selling_date')) {
            $this->model->last_selling_date= $request->last_selling_date;
        }
        if($request->has('closing_date') && $request->get('closing_date')){
            $this->model->closing_date = $request->closing_date;
        }
        if ($request->has('opening_date') && $request->get('opening_date')) {
            $this->model->opening_date = $request->opening_date;
        }
        if ($request->has('principle_selling_document') && $request->get('principle_selling_document')) {
            $this->model->principle_selling_document = $request->principle_selling_document;
        }
        if ($request->has('receiving_document') && $request->get('receiving_document')) {
            $this->model->receiving_document = $request->receiving_document;
        }
        if ($request->has('opening_document') && $request->get('opening_document')) {
            $this->model->opening_document = $request->opening_document;
        }
        if ($request->has('other_selling_document') && $request->get('other_selling_document')) {
            $this->model->other_selling_document = $request->other_selling_document;
        }
        if ($request->has('meeting_place') && $request->get('meeting_place')) {
            $this->model->meeting_place = $request->meeting_place;
        }
        if ($request->has('meeting_date') && $request->get('meeting_date')) {
            $this->model->meeting_date = $request->meeting_date;
        }
        if ($request->has('eligibility') && $request->get('eligibility')) {
            $this->model->eligibility = $request->eligibility;
        }
        if ($request->has('description_goods') && $request->get('description_goods')) {
            $this->model->description_goods = $request->description_goods;
        }
        if ($request->has('description_related_service') && $request->get('description_related_service')) {
            $this->model->description_related_service = $request->description_related_service;
        }
        if ($request->has('document_price') && $request->get('document_price')) {
            $this->model->document_price = $request->document_price;
        }
        if ($request->has('lot_no') && $request->get('lot_no')) {
            $this->model->lot_no = $request->lot_no;
        }
        if ($request->has('identification') && $request->get('identification')) {
            $this->model->identification = $request->identification;
        }
        if ($request->has('location') && $request->get('location')) {
            $this->model->location = $request->location;
        }
        if ($request->has('security_amount') && $request->get('security_amount')) {
            $this->model->security_amount = $request->security_amount;
        }
        if ($request->has('completion') && $request->get('completion')) {
            $this->model->completion = $request->completion;
        }
        if ($request->has('official_inviting_name') && $request->get('official_inviting_name')) {
            $this->model->official_inviting_name = $request->official_inviting_name;
        }
        if ($request->has('official_inviting_designation') && $request->get('official_inviting_designation')) {
            $this->model->official_inviting_designation = $request->official_inviting_designation;
        }
        if ($request->has('official_inviting_address') && $request->get('official_inviting_address')) {
            $this->model->official_inviting_address = $request->official_inviting_address;
        }
        if ($request->has('official_inviting_contact_phone') && $request->get('official_inviting_contact_phone')) {
            $this->model->official_inviting_contact_phone = $request->official_inviting_contact_phone;
        }
        if ($request->has('official_inviting_contact_fax') && $request->get('official_inviting_contact_fax')) {
            $this->model->official_inviting_contact_fax = $request->official_inviting_contact_fax;
        }
        if ($request->has('official_inviting_contact_email') && $request->get('official_inviting_contact_email')) {
            $this->model->official_inviting_contact_email = $request->official_inviting_contact_email;
        }

        $this->model->save();

        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $file) {
                $fileName = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName);
                $document = new TenderDocument();
                $document->file_name = $fileName;
                $document->tender_id = $this->model->id;

                $document->save();
            }
//
        }
        return $this->model;

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Tender Not Found');
        }
        if ($request->has('ministry_id') && $request->get('ministry_id')) {
            $item->ministry_id = $request->ministry_id;
        }
        if ($request->has('entity_name') && $request->get('entity_name')) {
            $item->entity_name = $request->entity_name;
        }
        if ($request->has('entity_code') && $request->get('entity_code')) {
            $item->entity_code = $request->entity_code;
        }
        if ($request->has('invitation_for') && $request->get('invitation_for')) {
            $item->invitation_for = $request->invitation_for;
        }
        if ($request->has('submission_date') && $request->get('submission_date')) {
            $item->submission_date = $request->submission_date;
        }
        if ($request->has('method') && $request->get('method')) {
            $item->method = $request->method;
        }
        if ($request->has('budget') && $request->get('budget')) {
           $item->budget = $request->budget;
        }
        if ($request->has('development_partner') && $request->get('development_partner')) {
            $item->development_partner = $request->development_partner;
        }
        if ($request->has('package_name') && $request->get('package_name')) {
            $item->package_name = $request->package_name;
        }
        if ($request->has('package_no') && $request->get('package_no')) {
            $item->package_no = $request->package_no;
        }
        if ($request->has('programme_name') && $request->get('programme_name')) {
            $item->programme_name = $request->programme_name;
        }
        if ($request->has('programme_code') && $request->get('programme_code')) {
            $item->programme_code = $request->programme_code;
        }
        if ($request->has('publish_date') && $request->get('publish_date')) {
            $item->publish_date = $request->publish_date;
        }
        if ($request->has('last_selling_date') && $request->get('last_selling_date')) {
            $item->last_selling_date= $request->last_selling_date;
        }
        if($request->has('closing_date') && $request->get('closing_date')){
            $item->closing_date = $request->closing_date;
        }
        if ($request->has('opening_date') && $request->get('opening_date')) {
            $item->opening_date = $request->opening_date;
        }
        if ($request->has('principle_selling_document') && $request->get('principle_selling_document')) {
            $item->principle_selling_document = $request->principle_selling_document;
        }
        if ($request->has('receiving_document') && $request->get('receiving_document')) {
            $item->receiving_document = $request->receiving_document;
        }
        if ($request->has('opening_document') && $request->get('opening_document')) {
            $item->opening_document = $request->opening_document;
        }
        if ($request->has('other_selling_document') && $request->get('other_selling_document')) {
            $item->other_selling_document = $request->other_selling_document;
        }
        if ($request->has('meeting_place') && $request->get('meeting_place')) {
            $item->meeting_place = $request->meeting_place;
        }
        if ($request->has('meeting_date') && $request->get('meeting_date')) {
            $item->meeting_date = $request->meeting_date;
        }
        if ($request->has('eligibility') && $request->get('eligibility')) {
            $item->eligibility = $request->eligibility;
        }
        if ($request->has('description_goods') && $request->get('description_goods')) {
            $item->description_goods = $request->description_goods;
        }
        if ($request->has('description_related_service') && $request->get('description_related_service')) {
            $item->description_related_service = $request->description_related_service;
        }
        if ($request->has('document_price') && $request->get('document_price')) {
            $item->document_price = $request->document_price;
        }
        if ($request->has('lot_no') && $request->get('lot_no')) {
            $item->lot_no = $request->lot_no;
        }
        if ($request->has('identification') && $request->get('identification')) {
            $item->identification = $request->identification;
        }
        if ($request->has('location') && $request->get('location')) {
            $item->location = $request->location;
        }
        if ($request->has('security_amount') && $request->get('security_amount')) {
            $item->security_amount = $request->security_amount;
        }
        if ($request->has('completion') && $request->get('completion')) {
            $item->completion = $request->completion;
        }
        if ($request->has('official_inviting_name') && $request->get('official_inviting_name')) {
            $item->official_inviting_name = $request->official_inviting_name;
        }
        if ($request->has('official_inviting_designation') && $request->get('official_inviting_designation')) {
            $item->official_inviting_designation = $request->official_inviting_designation;
        }
        if ($request->has('official_inviting_address') && $request->get('official_inviting_address')) {
            $item->official_inviting_address = $request->official_inviting_address;
        }
        if ($request->has('official_inviting_contact_phone') && $request->get('official_inviting_contact_phone')) {
            $item->official_inviting_contact_phone = $request->official_inviting_contact_phone;
        }
        if ($request->has('official_inviting_contact_fax') && $request->get('official_inviting_contact_fax')) {
            $item->official_inviting_contact_fax = $request->official_inviting_contact_fax;
        }
        if ($request->has('official_inviting_contact_email') && $request->get('official_inviting_contact_email')) {
            $item->official_inviting_contact_email = $request->official_inviting_contact_email;
        }
        if ($request->has('doc_id') && $request->get('doc_id'))
        {
            $doc_id = explode("," , $request->doc_id[0]) ;
            $tender_document = TenderDocument::where('tender_id', $item->id)->pluck('id')->toArray();
            $differenceArray = array_diff($tender_document, $doc_id);
//            dd($differenceArray);

            if (!empty($differenceArray))
            {
                foreach ($differenceArray as $singleDocId){
                   $singleDocInfo = TenderDocument::find($singleDocId);
                   Storage::delete('uploads/'. $singleDocInfo->file_name);
                   $singleDocInfo->delete();
                }
            }
        }

        if ($request->hasFile('file'))
        {
            foreach ($request->File('file') as $file)
            {
                $fileName = time(). '.' . $file->getClientOriginalName();
                $file->StoreAs('uploads/', $fileName);

                $document = new TenderDocument();
                $document->file_name = $fileName;
                $document->tender_id = $item->id;
                $document->save();
            }
        }



        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Tender Not Found');
        }

        return $item->delete();
    }

    public  function getAllMinistries()
    {
        return Ministry::all();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Tender Not Found');
        }
        return $item;
    }


}
