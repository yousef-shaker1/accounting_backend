<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResponce;

class ContactsController extends Controller
{
    use HttpResponses; 
    public function index(Request $request, $id){
        $search = $request->input('search');
        $page = $request->input('page', 1);
    
        $contacts = Contact::tenant()->where('business_id', $id)
            ->when($search, function($query) use ($search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%"); 
            })
            ->paginate(10, ['*'], 'page', $page);
    
            return response()->json([
                'message' => 'Success',
                'data' => ContactResponce::collection($contacts),
                'totalPages' => $contacts->lastPage(),
                'currentPage' => $contacts->currentPage(),
            ], 200);

    }

    public function show($id){
        $contact = Contact::tenant()->where('id',$id)->first();
        if(!$contact){
            return $this->errorResponse();
        }
        return $this->successResponse(new ContactResponce($contact));
    }

    public function store(ContactRequest $request) {
        $data = $request->validated();
        $data['tenant_id'] = Auth::user()->tenant_id;
        $contact = Contact::create($data);
        return $this->successResponse(new ContactResponce($contact));
    }

/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Update the specified contact in storage.
     *
     * @param ContactRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
/******  b028b901-5989-4a4d-bac2-1f84aead479a  *******/
    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::tenant()->findOrFail($id);
        
        if(!$contact){
            return $this->errorResponse();
        }
        $contact->update($request->validated());
    
        return $this->successResponse(new ContactResponce($contact));
    }

    public function destroy($id){
        $contact =  Contact::where('tenant_id', Auth::user()->tenant_id)->findOrFail($id);
        if(!$contact){
            return $this->errorResponse();
        }
        $contact->delete();

        return $this->successResponse(null);

    }

}
