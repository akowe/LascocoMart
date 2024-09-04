<div class="js-cookie-consent cookie-consent bottom-0 inset-x-0 pb-2" style=" width:100%;
    position:fixed;
    bottom:0;
    left:20px;
    margin:0;
    background:#ccc;">
    <div class="max-w-7xl mx-auto px-6 bg-secondary">
        <div class="p-2 rounded-lg ">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center ">
                    <p class="ml-3 text-white cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p> 
                </div>
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <button class="btn btn-success">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>

                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <button class="btn btn-success">
                        {{ trans('cookie-consent::texts.decline') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
