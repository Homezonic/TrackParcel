<main class="main-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{__('tpl.s21')  }}</h6>
                    </div>
                    @if ($showDemoNotification)
                    <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show"
                        role="alert">
                        <span class="alert-text text-white">
                            {{ __('tpl.demoNotif') }}</span>
                        <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                @if (session()->has('success'))
                <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    {{ session('success') }}
                </div>
            @endif
                    <div class="card-body pt-4 p-3">
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <label for="headerCode" class="form-label">Header Code</label>
                                <textarea wire:model.defer="headerCode" class="form-control" id="headerCode" rows="6">{{ htmlspecialchars_decode($headerCode) }}</textarea>

                            </div>
                            <div class="mb-3">
                                <label for="footerCode" class="form-label">Footer Code</label>
                                <textarea wire:model.defer="footerCode" class="form-control" id="footerCode" rows="6">{{ htmlspecialchars_decode($footerCode) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0"><strong>What can you insert?</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
<ul>
    <li>Insert Headers and Footers scripts</li>
    <li>Insert Google Analytics Tracking Code in Header and Footer</li>
    <li>Insert Facebook Pixels code, Google Conversion Pixels code, and other Advertising Conversion Pixel Scripts in your header and footer</li>
    <li>Insert Google AdSense Ads code, Amazon Native Contextual Ads code, and other Media Ads code</li>
    <li>Insert Custom JavaScript and CSS code</li>
    <li>Insert Site Verification Meta tags for Social Media, Google Search Console, and other Domain verification in the header and footer of your site</li>
    </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>