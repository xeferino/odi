<?php

namespace App\Http\Controllers\Admin;

use App\SelfAdministered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class SelfAdministeredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderImages = SelfAdministered::where('type', 'slider-image')->get();        
        $partners = SelfAdministered::where('type', 'partners')->get();
        $salesPhrase = SelfAdministered::where('type', 'sales-phrase')->first();
        $salesPhraseImage = SelfAdministered::where('type', 'sales-phrase-image')->first();
        $bestSellers = SelfAdministered::where('type', 'best-sellers')->get();
        $offers = SelfAdministered::where('type', 'offers')->get();
        $recommendations = SelfAdministered::where('type', 'recommendations')->get();
        $purchaseDetailsImage = SelfAdministered::where('type', 'purchase-details-image')->first();
        $offerImages = SelfAdministered::where('type', 'offer-images')->get();
        $testimonials = SelfAdministered::where('type', 'testimony')->get();
        return view('admin.selfadministered.index', compact('sliderImages', 'partners', 'salesPhrase', 'salesPhraseImage', 'bestSellers', 'offers', 'purchaseDetailsImage', 'offerImages', 'recommendations', 'testimonials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'content' => 'required',
            'order' => 'required|integer',
        ]);
        switch($validatedData['type']) {
            case 'purchase-details-image':
                $image = SelfAdministered::where('type', 'purchase-details-image')->first();
                if($image) {
                    File::delete(public_path($image->content));
                    $image->delete();
                }
                $validatedContent = $request->validate([
                    'content' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $data = $validatedData;
                $fileName = uniqid() . '.' . $request->content->getClientOriginalExtension();        
                $request->content->move(public_path('images/self'), $fileName);                
                $data['content'] = "images/self/" . $fileName;
                SelfAdministered::create($data);
                break;
            case 'partners':
            case 'slider-image':
                $validatedContent = $request->validate([
                    'content' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $data = $validatedData;
                $fileName = uniqid() . '.' . $request->content->getClientOriginalExtension();        
                $request->content->move(public_path('images/self'), $fileName);                
                $data['content'] = "images/self/" . $fileName;
                SelfAdministered::create($data);
                break;
            case 'sales-phrase-image':
                $image = SelfAdministered::where('type', 'sales-phrase-image')->first();
                if($image) {
                    File::delete(public_path($image->content));
                    $image->delete();
                }
                $validatedContent = $request->validate([
                    'content' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $data = $validatedData;                
                $fileName = uniqid() . '.' . $request->content->getClientOriginalExtension();        
                $request->content->move(public_path('images/self'), $fileName);                
                $data['content'] = "images/self/" . $fileName;
                SelfAdministered::create($data);
                break;
            case 'best-sellers':
            case 'offers':
            case 'recommendations':
                $validatedContent = $request->validate([
                    'content' => 'required|string|exists:products,sku',
                ]);
                $data = $validatedData;
                SelfAdministered::create($data);
                break;
            case 'offer-images':
                $validatedContent = $request->validate([
                    'content' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $data = $validatedData;
                $fileName = uniqid() . '.' . $request->content->getClientOriginalExtension();        
                $request->content->move(public_path('images/self'), $fileName);                
                $data['content'] = "images/self/" . $fileName;
                SelfAdministered::create($data);
                break;
            case 'testimony':
                $data = $validatedData;                
                $validatedContent = $request->validate([
                    'author' => 'required|string',
                    'testimony' => 'required|string',
                ]);
                $data['content'] = $validatedContent['author'] . "{::}" . $validatedContent['testimony'];
                SelfAdministered::create($data);
                break;
            default:
                $selfAdministered = SelfAdministered::where('type', $validatedData['type'])->first();
                if($selfAdministered) {
                    $selfAdministered->delete();
                }
                $validatedContent = $request->validate([
                    'content' => 'required|string',
                ]);
                $data = $validatedData;
                SelfAdministered::create($data);
                break;            
        }
        return redirect()->route('admin.selfadministered.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SelfAdministered  $selfAdministered
     * @return \Illuminate\Http\Response
     */
    public function show(SelfAdministered $selfAdministered)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SelfAdministered  $selfAdministered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelfAdministered $selfAdministered)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SelfAdministered  $selfAdministered
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelfAdministered $selfAdministered)
    {
        switch($selfAdministered->type) {
            case 'slider-image':
            case 'partners':
            case 'sales-phrase-image':
            case 'purchase-details-image':
            case 'offer-images':
                File::delete(public_path($selfAdministered->content));
            default:            
                $selfAdministered->delete();
                break;
        }
        return redirect()->route('admin.selfadministered.index');
    }

    public function sendNewsletter(Request $request) {
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'pdf' => 'required|mimes:pdf',
        ]);
        Mail::send([], [], function ($message) use ($validatedData, $request) {
            $message->bcc(NewsletterSubscriber::all()->pluck('email')->toArray())->subject($validatedData['subject'])->attach($request->file('pdf')->getRealPath(),
            [
                'as' => "newsletter.pdf",
                'mime' => "pdf",
            ]);
        });
        return redirect()->route('admin.selfadministered.index');
    }
}
