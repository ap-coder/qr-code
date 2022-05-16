@extends('layouts.frontend-no-sidebar')

@section('page-name')
    QR CODE GENERATOR
@endsection



@section('styles')
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        #chartdiv {
            width: 100%;
            height: 500px;
        }

    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Active QR Codes

            <div class="float-right"><a href="{{ route('qr-code-generator.create') }}" class="btn btn-success"> <i
                        class="fas fa-plus"></i> CREATE QR CODE</a></div>
        </div>
        <div class="card-body">
            {{-- <div class="col-12">
            <h2>There are no active QR Codes</h2>
        </div> --}}

            <div class="qr-manage-code">
                <span class="checkboxes-container qr-manage-code__checkbox">
                    <input type="checkbox">
                    <label class="qr-manage-code__checkbox-label">
                        <input type="checkbox">
                    </label>
                </span>
                <div class="qr-manage-code--row-first">
                    <div class="qr-manage-code__type">Website</div><span
                        class="qr-manage-code__type-icon fas fa-link"></span>
                    <div>
                        <div class="qr-manage-code__title qr-manage-code__title--editable">tapas vishwas</div>

                    </div>
                    <div class="qr-manage-code--row-first--col-left"><span
                            class="qr-manage-code__folder-icon fas fa-folder"></span>
                        <div class="qr-manage-code__folder">
                            <span class="qr-manage-code__folder-name">No folder</span>
                        </div>
                        <div class="qr-manage-code__date"><span class="qr-manage-code__date-icon fas fa-clock"></span>Apr 6,
                            2022</div>
                    </div>

                    <div class="qr-manage-code--row-first--col-right">
                        <div class="qr-manage-code__url"><span class="qr-manage-code__url-icon fas fa-link"></span>
                            <div class="qr-manage-code__url-container"><a class="qr-manage-code__url-link" target="_blank"
                                    href="https://qrco.de/bcv8ef">qrco.de/bcv8ef</a><i
                                    class="qr-manage-code__edit-icon icon icon-avatar-edit" data-toggle="tooltip"
                                    data-placement="bottom" title="" data-original-title="Edit Short URL"></i></div>
                            <div class="qr-manage-code__target"><span
                                    class="qr-manage-code__target-icon fas fa-level-up-alt"></span><a target="_blank"
                                    data-test="manage-qrcode-list-item-url"
                                    href="https://codefarming.com/">codefarming.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="qr-manage-code--row-second">
                    <div class="qr-manage-code--row-second--col-left">
                        <div class="qr-manage-code__stats">
                            <div class="qr-manage-code__scans">8</div>
                            <div class="qr-manage-code__scans-label">Scans</div><a class="qr-manage-code__insights"
                                data-test="manage-qrcode-list-item-open-insights"
                                href="#!/insights?folder=active&amp;id=34854189">Details<span
                                    class="qr-manage-code__insights-icon fas fa-arrow-right"></span></a>
                        </div>
                        <div class="qr-manage-code__qr">
                            <div class="qr-code-image"><img class="qr-code-image__image" alt=""
                                    src="{{ asset('site/img/qr_code.jpg') }}">

                            </div>
                        </div>
                    </div>
                    {{-- <div class="qr-manage-code--row-second--col-right">
                        <div class="qr-manage-code__download" value="value">
                            <div class="qr-manage-download--new">
                                <div class="qr-manage-download">
                                    <button class="qr-manage-download__button" type="button">Download</button>
                                </div>
                                <div class="qr-manage-download__actions">
                                    <button class="qr-manage-download__actions-more" type="button"><span
                                            class="qr-manage-download__icon icon icon-menu-vertical" data-toggle="tooltip"
                                            data-placement="bottom" title="" data-original-title=""></span></button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="qr-manage-code--row-second--col-right">
                        <div class="qr-manage-code__download" value="value">
                            <div class="qr-manage-download--new">
                                <div class="qr-manage-download">
                                    <button class="qr-manage-download__button" type="button">Download</button>
                                </div>
                                <div class="qr-manage-download__actions">
                                    <div>
                                        <button
                                            class="qr-icon-menu__item"
                                            data-toggle="tooltip" data-placement="bottom" title=""
                                            data-test="manage-qrcode-list-item-edit" data-original-title="Edit content"><i
                                                class="qr-icon-menu__icon fas fa-edit"
                                                ></i></button>
                                        <button
                                            class="qr-icon-menu__item" 
                                            data-toggle="tooltip" data-placement="bottom" title=""
                                            data-test="manage-qrcode-list-item-design"
                                            data-original-title="Design QR Code"><i
                                                class="qr-icon-menu__icon fas fa-palette"
                                               ></i></button>
                                        <button
                                            class="qr-icon-menu__item"
                                            data-toggle="tooltip" data-placement="bottom" title=""
                                            data-test="manage-qrcode-list-item-move-folder"
                                            data-original-title="Move to folder"><i
                                                class="qr-icon-menu__icon fas fa-folder"
                                                ></i></button>
                                        <button
                                        class="qr-manage-download__actions-more" type="button" data-test="manage-qrcode-list-item-actions-more"><span
                                            class="qr-manage-download__icon fas fa-ellipsis-v" data-toggle="tooltip"
                                            data-placement="bottom" title="" data-original-title=""></span></button>
                                </div>
                            </div>
                        </qr-manage-download>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('below-content')
@endsection

@section('scripts')
    @parent
@endsection
