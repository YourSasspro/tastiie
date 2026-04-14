<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Faqs;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class HomeController extends Controller
{


    public function index()
    {
        $carousels = Section::where('key', Section::$landingPageKey)->first()?->extra_data;
        $blogs = Blog::all();
        // $categories = Category::Active()->with(['products' => function ($query) {
        //     $query->with('reviews');
        // }])->get();
        // $categories = Category::Active()->whereHas('products')
        //     ->with(['products' => function ($query) {
        //         $query->with('reviews');
        //     }])->get();

        // $today = Carbon::today()->format('Y-m-d');
        
        // $categories = Category::Active()
        // ->whereHas('products', function ($query) use ($today) {
        //     $query->whereHas('availabilities', function ($availabilityQuery) use ($today) {
        //         $availabilityQuery->whereDate('available_date', '>=', $today);
        //     });
        // })
        // ->with(['products' => function ($query) use ($today) {
        //     $query->whereHas('availabilities', function ($availabilityQuery) use ($today) {
        //         $availabilityQuery->whereDate('available_date', '>=', $today);
        //     })
        //     ->with('reviews');
        // }])
        // ->get();
        // $today = Carbon::today()->format('Y-m-d');

        // $categories = Category::Active()
        //     ->whereHas('products', function ($query) use ($today) {
        //         $query->whereHas('availabilities', function ($availabilityQuery) use ($today) {
        //             $availabilityQuery->whereDate('available_date', '=', $today);
        //         });
        //     })
        //     ->with(['products' => function ($query) use ($today) {
        //         $query->whereHas('availabilities', function ($availabilityQuery) use ($today) {
        //             $availabilityQuery->whereDate('available_date', '=', $today);
        //         })
        //         ->with('reviews');
        //     }])
        //     ->get();
        $date = Carbon::today()->format('Y-m-d');
        $time = Carbon::now()->format('H:i');
        $categories = Category::whereHas('products', function ($query) use ($date, $time) {
            $query->whereHas('availabilities', function ($q) use ($date, $time) {
                if ($date) {
                    $q->whereDate('available_date', '=', $date);
                }
                if ($time) {
                    $q->where('start_time', '<=', $time)
                    ->where('end_time', '>=', $time);
                }
            });
        })->with(['products' => function ($query) use ($date, $time) {
            $query->whereHas('availabilities', function ($q) use ($date, $time) {
                if ($date) {
                    $q->whereDate('available_date', '=', $date);
                }
                if ($time) {
                    $q->where('start_time', '<=', $time)
                    ->where('end_time', '>=', $time);
                }
            });
        }])->get();


        // dd($categories);

        $products = Product::Active()->with('category')->get();
        $dietaryPreferences = Product::whereNotNull('dietary_preferences')
        ->pluck('dietary_preferences') // Get dietary_preferences column
        ->flatMap(function ($preferences) {
            return collect(json_decode($preferences, true))->map(fn($pref) => strtolower($pref)); // Convert JSON to array and lowercase
        })
        ->unique()
        ->values();
        // dd($dietaryPreferences);
        return view('web.default.pages.home', compact('carousels', 'products', 'categories','dietaryPreferences','blogs'));
    }

    public function faqs()
    {
        $faqs = Faqs::all();
        return view('web.default.pages.faqs', compact('faqs'));
    }

    public function whoWeAre(){
        $whoWeAreSection = Section::where('key', Section::$whoWeAre)->first();
        return view('web.default.pages.who-we-are', compact('whoWeAreSection'));
    }

    public function privacyPolicy(){
        $privacyPolicySection = Section::where('key', Section::$privacyPolicy)->first();
        return view('web.default.pages.privacy-policy', compact('privacyPolicySection'));
    }

    public function termsAndConditions(){
        $termsAndConditionsSection = Section::where('key', Section::$termsAndConditions)->first();
        return view('web.default.pages.terms-and-conditions', compact('termsAndConditionsSection'));
    }

    public function becomeALeader(){
        $becomeALeaderSection = Section::where('key', Section::$becomeALeader)->first();
        return view('web.default.pages.become-a-leader', compact('becomeALeaderSection'));
    }

    public function contactUs(){
        return view('web.default.pages.contact-us');
    }

    public function contactUsStore(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);
        $data = $request->all();
        Contact::create($data);

        return redirect()->back()->with(['message' => __('gen.message_submitted_successfully')]);
    }

    public function contactUsDelete(string $id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with(['message' => __('gen.deleted_successfully',['attribute' => trans('gen.contacts')])]);
    }



    public function blogs()
    {
        $blogPageSection = Section::where('key', Section::$blogPage)->first();
        $blogs = Blog::all();
        return view('web.default.pages.blogs', compact('blogs', 'blogPageSection'));
    }



    // public function filterProducts(Request $request)
    // {
    //     $date = $request->date;
    //     $time = $request->time;

    //     $dayOfWeek = $date ? Carbon::parse($date)->format('Y-m-d') : null;

    //     // Get categories with filtered products by day and time
    //     // $categories = Category::whereHas('products')->with(['products' => function ($query) use ($dayOfWeek, $time) {
    //     //     $query->whereHas('availabilities', function ($q) use ($dayOfWeek, $time) {
    //     //         if ($dayOfWeek) {
    //     //             $q->where('day', $dayOfWeek);
    //     //         }
    //     //         if ($time) {
    //     //             $q->where('start_time', '<=', $time)
    //     //             ->where('end_time', '>=', $time);
    //     //         }
    //     //     });
    //     // }])->get();

    //     // get categories with filtered products by date and time
    //     $categories = Category::whereHas('products', function ($query) use ($date, $time) {
    //         $query->whereHas('availabilities', function ($q) use ($date, $time) {
    //             if ($date) {
    //                 $q->whereDate('available_date', '=', $date);
    //             }
    //             if ($time) {
    //                 $q->where('start_time', '<=', $time)
    //                 ->where('end_time', '>=', $time);
    //             }
    //         });
    //     })->with(['products' => function ($query) use ($date, $time) {
    //         $query->whereHas('availabilities', function ($q) use ($date, $time) {
    //             if ($date) {
    //                 $q->whereDate('available_date', '=', $date);
    //             }
    //             if ($time) {
    //                 $q->where('start_time', '<=', $time)
    //                 ->where('end_time', '>=', $time);
    //             }
    //         });
    //     }])->get();

    //     // get category where at least one product is available
    //     // $categories = Category::whereHas('products', function ($query) use ($dayOfWeek, $time) {
    //     //     $query->whereHas('availabilities', function ($q) use ($dayOfWeek, $time) {
    //     //         if ($dayOfWeek) {
    //     //             $q->where('day', $dayOfWeek);
    //     //         }
    //     //         if ($time) {
    //     //             $q->where('start_time', '<=', $time)
    //     //             ->where('end_time', '>=', $time);
    //     //         }
    //     //     });
    //     // })->with(['products' => function ($query) use ($dayOfWeek, $time) {
    //     //     $query->whereHas('availabilities', function ($q) use ($dayOfWeek, $time) {
    //     //         if ($dayOfWeek) {
    //     //             $q->where('day', $dayOfWeek);
    //     //         }
    //     //         if ($time) {
    //     //             $q->where('start_time', '<=', $time)
    //     //             ->where('end_time', '>=', $time);
    //     //         }
    //     //     });
    //     // }])->get();

    //     return view('web.default.pages.partials.filtered-products', compact('categories'));
    // }
    
    public function filterProducts(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
    
        $startTime = null;
        $endTime   = null;
    
        // Convert single time to 1-hour slot
        if ($time) {
            $startTime = Carbon::createFromFormat('H:i', $time)->format('H:i:s');
            $endTime   = Carbon::createFromFormat('H:i', $time)
                            ->addHour()
                            ->format('H:i:s');
        }
    
        $categories = Category::whereHas('products', function ($query) use ($date, $startTime, $endTime) {
            $query->whereHas('availabilities', function ($q) use ($date, $startTime, $endTime) {
    
                if ($date) {
                    $q->whereDate('available_date', $date);
                }
    
                if ($startTime && $endTime) {
                    $q->where(function ($timeQuery) use ($startTime, $endTime) {
                        $timeQuery
                            ->where('start_time', '<', $endTime)
                            ->where('end_time', '>', $startTime);
                    });
                }
            });
        })
        ->with(['products' => function ($query) use ($date, $startTime, $endTime) {
            $query->whereHas('availabilities', function ($q) use ($date, $startTime, $endTime) {
    
                if ($date) {
                    $q->whereDate('available_date', $date);
                }
    
                if ($startTime && $endTime) {
                    $q->where(function ($timeQuery) use ($startTime, $endTime) {
                        $timeQuery
                            ->where('start_time', '<', $endTime)
                            ->where('end_time', '>', $startTime);
                    });
                }
            });
        }])
        ->get();
    
        return view('web.default.pages.partials.filtered-products', compact('categories'));
    }

    public function filterProductsByPreferences(Request $request)
    {
        $preferences = $request->input('preferences', []);

        // Fetch categories with filtered products
        // $categories = Category::with(['products' => function ($query) use ($preferences) {
        //     if (!empty($preferences)) {
        //         $query->whereNotNull('dietary_preferences')
        //             ->where(function ($query) use ($preferences) {
        //                 foreach ($preferences as $preference) {
        //                     $query->orWhereJsonContains('dietary_preferences', $preference);
        //                 }
        //             });
        //     }
        // }])->get();

        // use case-insentitive search
        $selectedPreferences = array_map('strtolower', $preferences);
        $categories = Category::whereHas('products')->with(['products' => function ($query) use ($selectedPreferences) {
            if (!empty($selectedPreferences)) {
                $query->whereNotNull('dietary_preferences')
                    ->where(function ($query) use ($selectedPreferences) {
                        foreach ($selectedPreferences as $preference) {
                            $query->orWhereRaw("LOWER(dietary_preferences) LIKE ?", ['%"'. strtolower($preference) .'%"']);
                        }
                    });
            }
        }])->get();

        return view('web.default.pages.partials.filtered-products', compact('categories'))->render();
    }
    
    //my emails
public function receiveMails()
{
    try {
        $mailbox = new \PhpImap\Mailbox(
            '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX',
            'exoux920@gmail.com',
            'jhrz mtmn vror ulel'
        );

        $allMailIds    = $mailbox->searchMailbox('ALL');
        $unreadMailIds = $mailbox->searchMailbox('UNSEEN'); // only unread

        if (!$allMailIds) return response()->json(['value' => []]);

        $threads = [];

        foreach ($allMailIds as $mailId) {
            $email = $mailbox->getMail($mailId);

            if (empty($email->messageId)) continue;

            // ✅ Read/unread detection
            $isRead = !in_array($mailId, $unreadMailIds);

            // Threading
            $threadId = $email->headers->{"in-reply-to"} ?? $email->messageId;
            $conversationId = base64_encode($threadId);

            $msg = [
                    "@odata.etag"      => "W/\"".md5($email->messageId)."\"",
                    "id"               => base64_encode($email->messageId),
                    "categories"       => [],
                    "receivedDateTime" => date("c", strtotime($email->date)),
                    "sentDateTime"     => date("c", strtotime($email->date)),
                    "hasAttachments"   => !empty($email->getAttachments()),
                    "attachments"      => collect($email->getAttachments())->map(function($att){
                        return [
                            "name"     => $att->name,
                            "filePath" => $att->filePath,
                            "mime"     => $att->mime,
                            "size"     => filesize($att->filePath)
                            // Optional: "content" => base64_encode($att->getContents()) // if you want raw content
                        ];
                    })->toArray(),
                    "subject"          => $email->subject,
                    "bodyPreview"      => substr(strip_tags($email->textPlain ?: $email->textHtml), 0, 120),
                    "importance"       => "normal",
                    "parentFolderId"   => base64_encode("INBOX"),
                    "conversationId"   => $conversationId,
                    "isRead"           => $isRead,
                    "body" => [
                        "contentType" => "text",
                        "content"     => $email->textPlain ?: strip_tags($email->textHtml)
                    ],
                    "from" => [
                        "emailAddress" => [
                            "name"    => $email->fromName,
                            "address" => $email->fromAddress
                        ]
                    ],
                    "toRecipients" => collect($email->to ?? [])->map(function($t){
                        if(is_object($t)) {
                            return [
                                "emailAddress" => [
                                    "name"    => $t->personal ?? null,
                                    "address" => $t->mailbox.'@'.$t->host
                                ]
                            ];
                        }
                        return [
                            "emailAddress" => [
                                "name"    => null,
                                "address" => $t
                            ]
                        ];
                    })->toArray(),
                    "ccRecipients"  => [],
                    "bccRecipients" => []
                ];


            $threads[$conversationId]['conversationId'] = $conversationId;
            $threads[$conversationId]['subject']        = $email->subject;
            $threads[$conversationId]['messages'][]     = $msg;
        }

        foreach ($threads as &$t) {
            usort($t['messages'], fn($a,$b)=>strtotime($b['sentDateTime']) <=> strtotime($a['sentDateTime']));
        }

        return response()->json(["value" => array_values($threads)]);

    } catch (\Exception $e) {
        return response()->json(["error" => $e->getMessage()]);
    }
}







}
