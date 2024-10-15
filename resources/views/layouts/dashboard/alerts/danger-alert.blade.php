
                        @if ($errors->any())
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                                <div class="iq-alert-text">
                                    <ul class="list-unsyled mb-0">
                                    @foreach ($errors->all() as $error )
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                </button>
                        </div>
                    @endif
