  <section class="my-5 py-5 calltoaction-bg">
      <div class="container">
          <div class="text-center text-white">
              <h2 class="heading">
                  @lang('gen.newsletter')
              </h2>
              <p class="description fw-normal">
                  @lang('gen.newsletter_text')
              </p>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <x-forms.form :action="route('newsletter.subscribe')">
                      <div class="form-group mt-4">
                          <x-forms.form-input type="text" name="name" placeholder="{{ __('gen.name') }}"
                              class="form-control subheading py-3 text-secondary fw-normal" />
                          <x-forms.input-error :messages="$errors->get('name')" />
                      </div>
                      <div class="form-group mt-2">
                          <x-forms.form-input type="email" name="email" placeholder="{{ __('gen.email') }}"
                              class="form-control subheading py-3 text-secondary fw-normal" />
                          <x-forms.input-error :messages="$errors->get('email')" />
                      </div>
                      <button type="submit" class="btn orange-bg mt-3 text-white rounded-5 w-100">
                          @lang('gen.subscribe')
                      </button>
                  </x-forms.form>
              </div>
          </div>
      </div>
  </section>
