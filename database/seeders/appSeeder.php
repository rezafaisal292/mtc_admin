<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Member\Entities\Member;
use Modules\Pageweb\Entities\Pageweb;
use Modules\Profile\Entities\Profile;
use Modules\Services\Entities\Services;

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
                'id' => Uuid::uuid4(), 'nama' => 'Services', 'url' => '#', 'icon' => 'fas fa-fw fa-cogs', 'parent' => null,
                'urutan' => 4, 'status' => '1', 'childs' => [
                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Data Services',
                        'url' => 'services',
                        'icon' => null,
                        'urutan' => 1,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],

                    [
                        'id' => Uuid::uuid4(),
                        'nama' => 'Data Produk',
                        'url' => 'produk',
                        'icon' => null,
                        'urutan' => 2,
                        'status' => '1',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ],
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
                'icon' => '
                <i class="material-icons medium">event</i>',
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
                'url' => 'landingproject',
                'name' => 'Project',
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
                'url' => 'landingprofile',
                'name' => 'Profile',
                'urutan' => 5,
                'status' => '1',
            ],
        ];
        foreach ($pageweb as $pw) {
            Pageweb::create($pw);
        }
        DB::table('app_profile')->delete();
        $profile = [
            'image' => null,
            'name' => 'ajprod',
            'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'phone' => '232123',
            'email' => '1',
            'address' => 'lorem ipsum',
            'longlat' => '23234234'
        ];
        Profile::create($profile);

        DB::table('app_member')->delete();
        $member = [
            [
                'image' => null,
                'name' => 'j25',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            ],
            [
                'image' => null,
                'name' => 'mtc',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            ],
            [
                'image' => null,
                'name' => 'hyper',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            ],
            [
                'image' => null,
                'name' => 'marinos',
                'descp' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            ]
        ];
        Member::create($member);
    }
}
