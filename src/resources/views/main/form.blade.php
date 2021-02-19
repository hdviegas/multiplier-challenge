<div class="card text-center">    
    <div class="card-header bg-white h4 text-start">
        @yield('page-name')
    </div>
    <div class="card-body">      
        <form id="main-form" method="{{$method}}" action="{{$action}}">
            @csrf
        @foreach ($fields as $field)
            <div class="mb-3 text-start">
                @if ($field['type']!='hidden')   
                    <label for="id-{{$field['name']}}" class="form-label">{{__("pages.".$page.".fields.".$field['name'])}}</label>
                @endif
                @if ($field['type']=='select')                                
                    <select class="form-select {{$field["class"] ?? ''}}" id="id-{{$field['name']}}" name="{{$field['name']}}">
                        @foreach ($field['options'] as $key=>$text)
                            <option value="{{$key}}"> {{$text}} </option>
                        @endforeach
                    </select>
                @else                                    
                    <input type="{{$field['type']}}" class="form-control {{$field["class"] ?? ''}}" id="id-{{$field['name']}}" name="{{$field['name']}}"  value="{{$data[$field['name']] ?? ''}}">
                @endif
            </div>
        @endforeach   
        </form>
    </div>
    <div class="card-footer text-muted text-start">        
        <button type="button" onclick="formSubmit($('form#main-form'))" class="btn btn-success btn-sm">{{__('main.buttons.save')}}</button>
        <button type="button" class="btn btn-primary btn-sm">{{__('main.buttons.reset')}}</button>
        <button type="button" onclick="history.go(-1);"  class="btn btn-secondary btn-sm">{{__('main.buttons.back')}}</button>
    </div>
  </div>
