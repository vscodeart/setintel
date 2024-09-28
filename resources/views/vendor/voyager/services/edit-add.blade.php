@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <link rel="stylesheet" href="/css/fancybox.css">

@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">


        <!-- form start -->
        <form role="form"
              class="form-edit-add"
              action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
              method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if($edit)
                {{ method_field("PUT") }}
            @endif

            <!-- CSRF TOKEN -->
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">

                    <div class="panel">
                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                $exclude = [
                                    'tag_content'
                                    ];

                            @endphp

                            @foreach($dataTypeRows as $row)
                                @if(!in_array($row->field, $exclude))
                                    <!-- GET THE DISPLAY OPTIONS -->
                                    @php
                                        $display_options = $row->details->display ?? NULL;
                                        if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                        }
                                    @endphp
                                    @if (isset($row->details->legend) && isset($row->details->legend->text))
                                        <legend class="text-{{ $row->details->legend->align ?? 'center' }}"
                                                style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                    @endif

                                    <div
                                        class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id))
                                        {{ "id=$display_options->id" }}
                                        @endif>
                                        {{ $row->slugify }}
                                        <label class="control-label"
                                               for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                        @if ($add && isset($row->details->view_add))
                                            @include($row->details->view_add, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'view' => 'add', 'options' => $row->details])
                                        @elseif ($edit && isset($row->details->view_edit))
                                            @include($row->details->view_edit, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'view' => 'edit', 'options' => $row->details])
                                        @elseif (isset($row->details->view))
                                            @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                        @elseif ($row->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['options' => $row->details])
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif


                                        @if ($errors->has($row->field))
                                            @foreach ($errors->get($row->field) as $error)
                                                <span class="help-block">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            @endforeach



                            @section('submit-buttons')
                                <button type="submit"
                                        class="btn btn-primary pull-right save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')


                        </div><!-- panel-body -->
                    </div>
                </div>
                <div class="col-md-4">


                    <!-- ### IMAGE ### -->


                    <!-- ### SEO CONTENT ### -->

                    <div class="panel panel-bordered panel-defaul">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i
                                    class="icon wb-search"></i> {{ __('Content Tags') }}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-up" data-toggle="panel-collapse"
                                   aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body" >
                            @foreach($dataTypeRows as $row)



                                @if($row->field =='tag_content')
                                    <div class="form-group  col-md-12 ">
{{--                                        <label class="control-label"--}}
{{--                                               for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>--}}

                                        <div class="field_wrapper">
                                            @php
                                                $topics  = json_decode($dataTypeContent->tag_content);
                                            @endphp

                                            @if(!empty($topics))
                                                @foreach($topics as $key =>  $topic)
                                                    <div class="form-group  col-md-12 ">
                                                        <span class="glyphicon glyphicon-move" aria-hidden="true"
                                                              style="position: absolute; left: -10px; top: 11px; cursor: grab "></span>
                                                        <input class=" form-control" type="text"
                                                               name="tag_content[{{$loop->iteration}}][title]" value="{{$topic->title}}" style="margin-bottom:10px;">
                                                        <textarea class=" form-control"
                                                                  name="tag_content[{{$loop->iteration}}][content]">{{$topic->content}}</textarea>
                                                        <a href="javascript:void(0);" class="remove_button"
                                                           style="float: right; position: absolute; right: -7px; top: 6px;">
                                                            <span class="glyphicon glyphicon-trash"
                                                                  aria-hidden="true"></span>
                                                        </a>
                                                    </div>

                                                @endforeach

                                            @endif

                                        </div>
                                    </div>


                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="button" href="javascript:void(0);"
                                                        class="btn btn-info add_button ">{{ __("Add new tag content") }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    </div>


                    @if($edit)

                </div>
                @endif


            </div>
    </div>


    </form>



    <div style="display:none">
        <input type="hidden" id="upload_url" value="{{ route('voyager.upload') }}">
        <input type="hidden" id="upload_type_slug" value="{{ $dataType->slug }}">
    </div>

    </div>


    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'
                    </h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger"
                            id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')

    <script src="/js/jquery-ui.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/fancybox.umd.js"></script>



    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
            return function () {
                $file = $(this).siblings(tag);

                params = {
                    slug: '{{ $dataType->slug }}',
                    filename: $file.data('file-name'),
                    id: $file.data('id'),
                    field: $file.parent().data('field-name'),
                    multi: isMulti,
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text(params.filename);
                $('#confirm_delete_modal').modal('show');
            };
        }

        $('document').ready(function () {

            // event topics start
            $(".field_wrapper").sortable();
            var addButton = '.add_button';
            var wrapper = $('.field_wrapper');
            var fieldCount = $('.field_wrapper  .form-control').length;
            var x = fieldCount;


            $(document).on("click", addButton, function (e) {
                e.preventDefault();
                var fieldHTML = `<div class="form-group  col-md-12 ">
            <span class="glyphicon glyphicon-move" aria-hidden="true" style="position: absolute; left: -10px; top: 11px; cursor:grab ;"></span>
            <input class=" form-control" type="text"  name="tag_content[${x}][title]" style="margin-bottom:10px;" value=""/>
            <textarea class=" form-control" type="text"  name="tag_content[${x}][content]"></textarea>
            <a href="javascript:void(0);" class="remove_button" style="float: right; position: absolute; right: -7px; top: 6px;">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
            </div>`;
                    x++;
                    $(wrapper).append(fieldHTML);

            });


            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
            });

            // event topics end

            $('#slug').slugify();
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: ['YYYY-MM-DD']
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            $('.side-body input[data-slug-origin]').each(function (i, el) {
                $(el).slugify();
            });
            @endif

            $('.side-body input[data-slug-origin]').each(function (i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.panel-body').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function () {
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if (response
                        && response.data
                        && response.data.status
                        && response.data.status == 200) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function () {
                            $(this).remove();
                        })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
