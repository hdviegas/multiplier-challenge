<div class="card text-center">    
    <div class="card-header bg-white h4 text-start">
        @yield('page-name')
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th class="text-start border-b">{{__("pages.".$page.".fields.".$column)}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        @foreach ($item as $value)
                            <td class="text-start border-b"> {{$value}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
    <div class="card-footer text-muted text-start">        
        <button type="button" onclick="location.href='@yield('add-link')'; " class="btn btn-success btn-sm">{{__("main.buttons.add")}}</button>        
        <button type="button" onclick="history.go(-1);" class="btn btn-secondary btn-sm">{{__("main.buttons.back")}}</button>
    </div>
  </div>
