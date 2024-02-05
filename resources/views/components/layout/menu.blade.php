<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                {{-- <li class="has-submenu">
                    <a href="index.html"><i class="mdi mdi-home"></i>Dashboard</a>
                </li> --}}
                <x-partial.main_menu mainHref="{{ url('/') }}"/>
              
                @can('is-satker')
                    <x-partial.main_menu :subMenus="$menuLaporan->where('periode','bulanan')" icon="mdi mdi-black-mesa" mainTitle="Laporan Bulanan" mainUrl="monthly_report/"/>
             
                    <x-partial.main_menu :subMenus="$menuLaporan->where('periode','caturwulan')" icon="mdi mdi-arrange-send-backward" mainTitle="Laporan Caturwulan" mainUrl="quarterly_report/"/>
                    <x-partial.main_menu :subMenus="$menuLaporan->where('periode','semester')" icon="mdi mdi-archive" mainTitle="Laporan Semester" mainUrl="semester_report/"/>
                    <x-partial.main_menu :subMenus="$menuLaporan->where('periode','tahunan')" icon="mdi mdi-arrow-collapse-all" mainTitle="Laporan Tahunan" mainUrl="yearly_report/"/>
                @endcan
                
                    @php
                        $satkers=App\Models\Satker::all();
                        $satkerMenu=$satkers->map(function($item,$key){
                            $data=(object)['id'=>$item->id.'/bulanan',
                                'for_menu'=>$item->nick_name];

                            return $data;
                        });
                        $satkerMenuCw=$satkers->map(function($item,$key){
                            $data=(object)['id'=>$item->id.'/caturwulan',
                                'for_menu'=>$item->nick_name];

                            return $data;
                        });
                        $satkerMenuSm=$satkers->map(function($item,$key){
                            $data=(object)['id'=>$item->id.'/semester',
                                'for_menu'=>$item->nick_name];

                            return $data;
                        });
                        $satkerMenuYr=$satkers->map(function($item,$key){
                            $data=(object)['id'=>$item->id.'/tahunan',
                                'for_menu'=>$item->nick_name];

                            return $data;
                        });

                        $settingMenu=[
                            (object)[
                                'id'=>"satker",
                                'for_menu'=>"Satker"
                            ],
                            (object)[
                                'id'=>"account",
                                'for_menu'=>"Akun"
                            ],
                        ];
                      
                       
                    @endphp
                    @can('is-admin')
                        <x-partial.main_menu :subMenus="$satkerMenu" icon="mdi mdi-arrow-collapse-all" mainTitle="Laporan Bulanan Satker" mainUrl="monthly_report_satker/"/>
                        <x-partial.main_menu :subMenus="$satkerMenuCw" icon="mdi mdi-arrow-collapse-all" mainTitle="Laporan Caturwulan Satker" mainUrl="quarterly_report_satker/"/>
                        <x-partial.main_menu :subMenus="$satkerMenuSm" icon="mdi mdi-arrow-collapse-all" mainTitle="Laporan Semester Satker" mainUrl="semester_report_satker/"/>
                        <x-partial.main_menu :subMenus="$satkerMenuYr" icon="mdi mdi-arrow-collapse-all" mainTitle="Laporan Tahunan Satker" mainUrl="yearly_report_satker/"/>
                        <x-partial.main_menu :subMenus="$settingMenu" icon="mdi mdi-arrow-collapse-all" mainTitle="Setting" mainUrl="setting/"/>
                    @endcan
                

               
              

            </ul>
            <!-- End navigation menu -->
        </div> <!-- end #navigation -->
    </div> <!-- end container -->
</div>