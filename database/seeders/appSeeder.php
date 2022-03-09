<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Member\Entities\Member;
use Modules\Pageweb\Entities\Pageweb;
use Modules\Produk\Entities\Produk;
use Modules\Profile\Entities\Profile;
use Modules\Services\Entities\Services;
use Illuminate\Support\Str;
use Modules\Banner\Entities\Banner;
use Modules\Client\Entities\Client;
use Modules\Membersosmed\Entities\MemberSosmed;
use Modules\Profile\Entities\ProfileKontak;
use Modules\Sosmed\Entities\Sosmed;

class appSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $mstPage = [
            [
                'id' => Uuid::uuid4(), 'nama' => 'Services', 'url' => 'services', 'icon' => 'fas fa-fw fa-cogs', 'parent' => null,
                'urutan' => 4, 'status' => '1', 'childs' => [],
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'Profile', 'url' => 'profile', 'icon' => 'fas fa-fw fa-address-book', 'parent' => null,
                'urutan' => 5, 'status' => '1', 'childs' => []
            ],

            [
                'id' => Uuid::uuid4(), 'nama' => 'Data Produk', 'url' => '#', 'icon' => 'fas fa-fw fa-briefcase', 'parent' => null,
                'urutan' => 6, 'status' => '1', 'childs' => [
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Produk',
                        'url' => 'produk',
                        'icon' => null,
                        'urutan' => 1,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Produk Detail',
                        'url' => 'produkdetail',
                        'icon' => null,
                        'urutan' => 2,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ],
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'Sosmed', 'url' => 'sosmed', 'icon' => 'fas fa-fw fa-wifi', 'parent' => null,
                'urutan' => 7, 'status' => '1', 'childs' => []
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'Data Member', 'url' => '#', 'icon' => 'fas fa-fw fa-id-card', 'parent' => null,
                'urutan' => 8, 'status' => '1', 'childs' => [
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Member',
                        'url' => 'member',
                        'icon' => null,
                        'urutan' => 1,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Member Detail',
                        'url' => 'memberdetail',
                        'icon' => null,
                        'urutan' => 2,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Member Sosmed',
                        'url' => 'membersosmed',
                        'icon' => null,
                        'urutan' => 3,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ]
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'Banner', 'url' => 'banner', 'icon' => 'fas fa-fw fa-images', 'parent' => null,
                'urutan' => 9, 'status' => '1', 'childs' => []
            ],
            [
                'id' => Uuid::uuid4(), 'nama' => 'Client', 'url' => 'client', 'icon' => 'fas fa-fw fa-briefcase', 'parent' => null,
                'urutan' => 10, 'status' => '1', 'childs' => []
            ],
        ];

        foreach ($mstPage as $page) {
            $childs = $page['childs'];

            unset($page['childs']);
            \Modules\MasterPage\Entities\MasterPage::create($page);

            if (!empty($childs)) {
                $pageId = \Modules\MasterPage\Entities\MasterPage::findByName($page['nama']);

                foreach ($childs as $child) {
                    $child['parent'] = $pageId->id;
                    \Modules\MasterPage\Entities\MasterPage::create($child);
                }
            }
        }


        DB::table('app_services')->delete();
        $services = [
            [
                'icon' => '<i class="material-icons medium">copyright</i>',
                'label' => 'DIGITAL CONTENT',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status' => '1',
            ],
            [
                'icon' => '<i class="material-icons medium">event</i>',
                'label' => 'EVENT & WEDDING PLANNER',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status' => '1',
            ],
            [
                'icon' => '<i class="material-icons medium">event_available</i>',
                'label' => 'MANAGEMENT ARTIST',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status' => '1',
            ],
            [
                'icon' => '<i class="material-icons medium">call_to_action</i>',
                'label' => 'PRODUCTION VENDOR',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status' => '1',
            ]

        ];
        foreach ($services as $s) {
            Services::create($s);
        }

        DB::table('app_page_web')->delete();
        $pageweb = [
            [
                'url' => 'landinghome',
                'name' => 'Home',
                'urutan' => 1,
                'status' => '1',
            ],
            [
                'url' => 'landingproduk',
                'name' => 'Produk',
                'urutan' => 2,
                'status' => '1',
            ],

            [
                'url' => 'landingservices',
                'name' => 'Services',
                'urutan' => 3,
                'status' => '1',
            ],
            [
                'url' => 'landingmember',
                'name' => 'Member',
                'urutan' => 4,
                'status' => '1',
            ],
            [
                'url' => 'landingnews',
                'name' => 'News',
                'urutan' => 5,
                'status' => '1',
            ],
            [
                'url' => 'landingprofile',
                'name' => 'Profile',
                'urutan' => 6,
                'status' => '1',
            ],
        ];
        foreach ($pageweb as $pw) {
            Pageweb::create($pw);
        }

        DB::table('app_sosmed')->delete();
        $sosmed = [
            [
                'image' => 'images/master/spotify.png',
                'name' => 'Spotify',
            ],
            [
                'image' => null,
                'name' => 'Whatsapp',
            ],
            [
                'image' => null,
                'name' => 'Email',
            ],
            [
                'image' => null,
                'name' => 'Telepon',
            ],
        ];
        foreach ($sosmed as $s) {
            Sosmed::create($s);
        }

        DB::table('app_profile')->delete();
        $profile = [
            'image' => 'images/master/aj25.png',
            'name' => 'AJ25 Production',
            'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        ];
        Profile::create($profile);

        DB::table('app_profile_kontak')->delete();
        $profileKontak =
            [
                [
                    'id_profile' => Profile::first()->id,
                    'id_sosmed' => Sosmed::where('name', 'Email')->first()->id,
                    'data' => 'aj@gmail.com',
                ]
            ];
        foreach ($profileKontak as $pk) {
            ProfileKontak::create($pk);
        }


        DB::table('app_member')->delete();
        $member = [
            [
                'image' =>  'images/master/j25.png',
                'imagebanner' => null,
                'name' => 'J25',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status'=>'1'
            ],
            [
                'image' =>  'images/master/mtc.png',
                'imagebanner' => null,
                'name' => 'MTC',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status'=>'1'
            ],
            [
                'image' => 'images/master/hyper.png',
                'imagebanner' => 'images/master/hyperbanner.jpg',
                'name' => 'Hyper',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status'=>'1'
            ],
            [
                'image' =>  'images/master/marinosh.png',
                'imagebanner' => 'images/master/marinoshbanner.jpg',
                'name' => 'Marinosh',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'status'=>'1'
            ]
        ];
        foreach ($member as $m) {
            Member::create($m);
        }


        $now = now();
        $options = [
            [
                'id' => Str::uuid(), 'name' => 'tipe_produk', 'created_at' => $now, 'updated_at' => $now,
                'values' => [
                    [
                        'id' => Str::uuid(), 'key' => '1', 'value' => 'Produk', 'sequence' => 1,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                    [
                        'id' => Str::uuid(), 'key' => '2', 'value' => 'News', 'sequence' => 2,
                        'created_at' => $now, 'updated_at' => $now
                    ],
                ]
            ],

        ];

        foreach ($options as $option) {
            $values = $option['values'];
            \Illuminate\Support\Arr::forget($option, 'values');

            DB::table('master_option_group')->insert($option);

            foreach ($values as $value) {
                $value['option_group_id'] = $option['id'];
                DB::table('master_option_value')->insert($value);
            }
        }



        DB::table('app_produk')->delete();
        $produk = [
            [
                'url' => 'https://www.youtube.com/embed/aAc0OAgBLn0',
                'image' => null,
                'label' => 'MV Hyper',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'member' => Member::where('name','Hyper')->first()->id,
                'services' => Services::where('label','DIGITAL CONTENT')->first()->id,
                'tipe_produk' => '1',
                'status' => '1'
            ],
            [
                'url' => 'https://www.youtube.com/embed/kWBKPhyPV2w',
                'image' => null,
                'label' => 'Sakit Gigi',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'member' => null,
                'services' =>   Services::where('label','MANAGEMENT ARTIST')->first()->id,
                'tipe_produk' => '1',
                'status' => '1'
            ],
            [
                'url' => 'https://www.youtube.com/embed/b6sjIXvaeJA',
                'image' => null,
                'label' => 'Marinosh',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'member' => null,
                'services' =>   null,
                'tipe_produk' => '1',
                'status' => '1'
            ],
            [
                'url' => 'https://www.youtube.com/embed/xHNy4Vrq73E',
                'image' => null,
                'label' => 'Felix Irawan',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'member' => Member::where('name','J25')->first()->id,
                'services' => Services::where('label','DIGITAL CONTENT')->first()->id,
                'tipe_produk' => '2',
                'status' => '1'
            ],
        ];
        foreach ($produk as $p) {
            Produk::create($p);
        }


        DB::table('app_banner')->delete();
        $banner = [
            [
                'image' => 'images/master/hom1.JPG',
                'label' => 'Lorem Ipsum is simply',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'urutan' => 1,
                'status' => '1'
            ],
            [
                'image' => 'images/master/hom2.JPG',
                'label' => 'Lorem Ipsum is simply',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'urutan' => 2,
                'status' => '1'
            ],
            [
                'image' => 'images/master/hom3.JPG',
                'label' => 'Lorem Ipsum is simply',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'urutan' => 3,
                'status' => '1'
            ],
        ];
        foreach ($banner as $b) {
            Banner::create($b);
        }

        DB::table('app_client')->delete();
        $client = [
            [
                'image' => 'images/master/traveloka.png',
                'label' => 'Lorem Ipsum is simply',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'status' => '1'
            ], [
                'image' => 'images/master/tokopedia.png',
                'label' => 'Lorem Ipsum is simply',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'status' => '1'
            ],
            [
                'image' => 'images/master/gojek.png',
                'label' => 'Lorem Ipsum is simply',
                'descp' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum',
                'status' => '1'
            ],

        ];
        foreach ($client as $c) {
            Client::create($c);
        }


        DB::table('app_member_sosmed')->delete();
        $member_sosmed = [
            [

                'url' => 'asdasdad',
                'sosmed' => Sosmed::where('name', 'Spotify')->first()->id,
                'member' => Member::where('name', 'J25')->first()->id,
            ],
            [

                'url' => 'asdasdad',
                'sosmed' => Sosmed::where('name', 'Spotify')->first()->id,
                'member' => Member::where('name', 'Hyper')->first()->id,
            ],
            [

                'url' => 'asdasdad',
                'sosmed' => Sosmed::where('name', 'Spotify')->first()->id,
                'member' => Member::where('name', 'Marinosh')->first()->id,
            ],
            [
                'url' => 'asdasdad',
                'sosmed' => Sosmed::where('name', 'Spotify')->first()->id,
                'member' => Member::where('name', 'MTC')->first()->id,
            ],


        ];
        foreach ($member_sosmed as $ms) {
            MemberSosmed::create($ms);
        }
    }
}
