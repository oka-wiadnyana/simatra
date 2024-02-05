<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Demo purpose only -->
                    <div >

                        <h4 class="mt-0 header-title">Laporan Bulanan</h4>
                        <div class="row">
                            <div class="col-4 d-flex">
                            <div class="col">
                    
                                    <x-partial.select selectLabel="" :selectValue="$monthYearSelect['month']" optValue="id" optText="name" selectName="month" wireModel="month"/>
                                </div>
                                <div class="col"  >
                    
                                    <x-partial.select selectLabel="" :selectValue="$monthYearSelect['year']" optValue="name" optText="name" selectName="year" wireModel="year"/>
                                </div>
                                <div class="col d-flex align-items-center"  >
                    
                                    <x-partial.button text="Cari" wireClick="findData()"/>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="table-responsive">
                    
                    
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Satker</th>
                                @foreach ($monthlyReport as $report)
                                    <th>{{ $report->for_menu }}</th>
                                @endforeach
                            
                            
                            </tr>
                            </thead>
                    
                    
                            <tbody>
                                @foreach ($monthlyData as $key=>$value)
                                
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($monthlyReport as $r)
                                        
                                                
                                                <td class="text-center"> 
                                                    @if(!$value->isEmpty())
                                                    @php
                                                        $count=0;
                                                    @endphp
                                                    @foreach ($value as $v)
                                                    
                                                    @if($r->id==$v->report_type_id)
                                                    @if ($v->notes)
                                                    <i class="mdi mdi-minus-circle text-danger" style="font-size: 3rem"></i>    
                                                    @else
                                                    <i class="mdi mdi-check-circle text-primary" style="font-size: 3rem"></i>
                                                    @endif 
                                                    
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                    @endforeach
                                                    @if ($count==0)
                                                
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                            
                                                    @endif
                                                    @else
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                                    @endif
                                                
                                                </td>
                                            
                                        
                                            
                                        
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Demo purpose only -->
                    <div >

                        <h4 class="mt-0 header-title">Laporan Caturwulan</h4>
                        <div class="row">
                            <div class="col-4 d-flex">
                            <div class="col">
                                    @php
                                        $quarterSelect=[
                                            [
                                                'id'=>'I',
                                                'name'=>'I',
                                            ],
                                            [
                                                'id'=>'II',
                                                'name'=>'II',
                                            ],
                                            [
                                                'id'=>'III',
                                                'name'=>'III',
                                            ],
                                            [
                                                'id'=>'IV',
                                                'name'=>'IV',
                                            ]
                                        ]
                                    @endphp 
                                    <x-partial.select selectLabel="" :selectValue="collect($quarterSelect)" optValue="id" optText="name" selectName="quarter" wireModel="quarter"/>
                                </div>
                                <div class="col"  >
                    
                                    <x-partial.select selectLabel="" :selectValue="$monthYearSelect['year']" optValue="name" optText="name" selectName="year" wireModel="quarterlyYear"/>
                                </div>
                                <div class="col d-flex align-items-center"  >
                    
                                    <x-partial.button text="Cari" wireClick="findDataQuarterly()"/>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="table-responsive">
                    
                    
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Satker</th>
                                @foreach ($quarterlyReport as $report)
                                    <th>{{ $report->for_menu }}</th>
                                @endforeach
                            
                            
                            </tr>
                            </thead>
                    
                    
                            <tbody>
                                @foreach ($quarterlyData as $key=>$value)
                                
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($quarterlyReport as $r)
                                        
                                                
                                                <td class="text-center"> 
                                                    @if(!$value->isEmpty())
                                                    @php
                                                        $count=0;
                                                    @endphp
                                                    @foreach ($value as $v)
                                                    
                                                    @if($r->id==$v->report_type_id)
                                                    @if ($v->notes)
                                                    <i class="mdi mdi-minus-circle text-danger" style="font-size: 3rem"></i>    
                                                    @else
                                                    <i class="mdi mdi-check-circle text-primary" style="font-size: 3rem"></i>
                                                    @endif 
                                                    
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                    @endforeach
                                                    @if ($count==0)
                                                
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                            
                                                    @endif
                                                    @else
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                                    @endif
                                                
                                                </td>
                                            
                                        
                                            
                                        
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Demo purpose only -->
                    <div >

                        <h4 class="mt-0 header-title">Laporan Semester</h4>
                        <div class="row">
                            <div class="col-4 d-flex">
                            <div class="col">
                                    @php
                                        $semesterSelect=[
                                            [
                                                'id'=>'I',
                                                'name'=>'I',
                                            ],
                                            [
                                                'id'=>'II',
                                                'name'=>'II',
                                            ],
                                            
                                        ]
                                    @endphp 
                                    <x-partial.select selectLabel="" :selectValue="collect($semesterSelect)" optValue="id" optText="name" selectName="semester" wireModel="semester"/>
                                </div>
                                <div class="col"  >
                    
                                    <x-partial.select selectLabel="" :selectValue="$monthYearSelect['year']" optValue="name" optText="name" selectName="year" wireModel="semesterYear"/>
                                </div>
                                <div class="col d-flex align-items-center"  >
                    
                                    <x-partial.button text="Cari" wireClick="findDataSemester()"/>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="table-responsive">
                    
                    
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Satker</th>
                                @foreach ($semesterReport as $report)
                                    <th>{{ $report->for_menu }}</th>
                                @endforeach
                            
                            
                            </tr>
                            </thead>
                    
                    
                            <tbody>
                                @foreach ($semesterData as $key=>$value)
                                
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($semesterReport as $r)
                                        
                                                
                                                <td class="text-center"> 
                                                    @if(!$value->isEmpty())
                                                    @php
                                                        $count=0;
                                                    @endphp
                                                    @foreach ($value as $v)
                                                    
                                                    @if($r->id==$v->report_type_id)
                                                    @if ($v->notes)
                                                    <i class="mdi mdi-minus-circle text-danger" style="font-size: 3rem"></i>    
                                                    @else
                                                    <i class="mdi mdi-check-circle text-primary" style="font-size: 3rem"></i>
                                                    @endif 
                                                    
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                    @endforeach
                                                    @if ($count==0)
                                                
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                            
                                                    @endif
                                                    @else
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                                    @endif
                                                
                                                </td>
                                            
                                        
                                            
                                        
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Demo purpose only -->
                    <div >

                        <h4 class="mt-0 header-title">Laporan Tahunan</h4>
                        <div class="row">
                            <div class="col-4 d-flex">
                            
                                <div class="col"  >
                    
                                    <x-partial.select selectLabel="" :selectValue="$monthYearSelect['year']" optValue="name" optText="name" selectName="year" wireModel="yearlyYear"/>
                                </div>
                                <div class="col d-flex align-items-center"  >
                    
                                    <x-partial.button text="Cari" wireClick="findDataYearly()"/>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="table-responsive">
                    
                    
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Satker</th>
                                @foreach ($yearlyReport as $report)
                                    <th>{{ $report->for_menu }}</th>
                                @endforeach
                            
                            
                            </tr>
                            </thead>
                    
                    
                            <tbody>
                                @foreach ($yearlyData as $key=>$value)
                                
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($yearlyReport as $r)
                                        
                                                
                                                <td class="text-center"> 
                                                    @if(!$value->isEmpty())
                                                    @php
                                                        $count=0;
                                                    @endphp
                                                    @foreach ($value as $v)
                                                    
                                                    @if($r->id==$v->report_type_id)
                                                    @if ($v->notes)
                                                    <i class="mdi mdi-minus-circle text-danger" style="font-size: 3rem"></i>    
                                                    @else
                                                    <i class="mdi mdi-check-circle text-primary" style="font-size: 3rem"></i>
                                                    @endif 
                                                    
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                    @endforeach
                                                    @if ($count==0)
                                                
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                            
                                                    @endif
                                                    @else
                                                    <i class="mdi mdi-minus-circle-outline" style="font-size: 3rem"></i>
                                                    @endif
                                                
                                                </td>
                                            
                                        
                                            
                                        
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>

    </div>
</div>



