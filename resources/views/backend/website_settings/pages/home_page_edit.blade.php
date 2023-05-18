@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Home Page Settings') }}</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xxl-8 mx-auto">
		
		{{-- Home Slider --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Slider') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Photos & Links') }}</label>
						<div class="home-slider-target">
							<input type="hidden" name="types[]" value="home_slider_images">
							<input type="hidden" name="types[]" value="home_slider_links">
							@if (get_setting('home_slider_images') != null)
								@foreach (json_decode(get_setting('home_slider_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-6">
											<div class="form-group">
												<label>{{ translate('Link') }}</label>
												<input type="hidden" name="types[]" value="home_slider_links">
												<input type="text" class="form-control" placeholder="link with http:// or https://" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>{{ translate('Title') }}</label>
												<input type="hidden" name="types[]" value="home_slider_title">
												<input type="text" class="form-control" placeholder="title" name="home_slider_title[]" value="{{ json_decode(get_setting('home_slider_title'), true)[$key] }}">
											</div>
										</div>
										<div class="col-4">
											<label>{{ translate('Background') }}</label>
											<div class="input-group" data-toggle="aizuploader" data-type="image">
				                                <div class="input-group-prepend">
				                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
				                                </div>
				                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
												<input type="hidden" name="types[]" value="home_slider_background">
				                                <input type="hidden" name="home_slider_background[]" class="selected-files" value="{{ json_decode(get_setting('home_slider_background'), true)[$key] }}">
				                            </div>
				                            <div class="file-preview box sm">
				                            </div>
										</div>
										<div class="col-4">
											<label>{{ translate('Product Image') }}</label>
											<div class="input-group" data-toggle="aizuploader" data-type="image">
				                                <div class="input-group-prepend">
				                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
				                                </div>
				                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
												<input type="hidden" name="types[]" value="home_slider_images">
				                                <input type="hidden" name="home_slider_images[]" class="selected-files" value="{{ json_decode(get_setting('home_slider_images'), true)[$key] }}">
				                            </div>
				                            <div class="file-preview box sm">
				                            </div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label>{{ translate('Subtitle') }}</label>
												<input type="hidden" name="types[]" value="home_slider_subtitle">
												<input type="text" class="form-control" placeholder="sub title" name="home_slider_subtitle[]" value="{{ json_decode(get_setting('home_slider_subtitle'), true)[$key] }}">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-4 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								@endforeach
							@endif
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm mt-3"
							data-toggle="add-more"
							data-content='
							<div class="row gutters-5">
								<div class="col-6">
									<div class="form-group">
										<label>{{ translate('Link') }}</label>
										<input type="hidden" name="types[]" value="home_slider_links">
										<input type="text" class="form-control" placeholder="link with http:// or https://" name="home_slider_links[]">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>{{ translate('Title') }}</label>
										<input type="hidden" name="types[]" value="home_slider_title">
										<input type="text" class="form-control" placeholder="title" name="home_slider_title[]">
									</div>
								</div>
								<div class="col-4">
									<label>{{ translate('Background') }}</label>
									<div class="input-group" data-toggle="aizuploader" data-type="image">
										<div class="input-group-prepend">
											<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
										</div>
										<div class="form-control file-amount">{{ translate('Choose File') }}</div>
										<input type="hidden" name="types[]" value="home_slider_background">
										<input type="hidden" name="home_slider_background[]" class="selected-files">
									</div>
									<div class="file-preview box sm">
									</div>
								</div>
								<div class="col-4">
									<label>{{ translate('Product Image') }}</label>
									<div class="input-group" data-toggle="aizuploader" data-type="image">
										<div class="input-group-prepend">
											<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
										</div>
										<div class="form-control file-amount">{{ translate('Choose File') }}</div>
										<input type="hidden" name="types[]" value="home_slider_images">
										<input type="hidden" name="home_slider_images[]" class="selected-files">
									</div>
									<div class="file-preview box sm">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>{{ translate('Subtitle') }}</label>
										<input type="hidden" name="types[]" value="home_slider_subtitle">
										<input type="text" class="form-control" placeholder="sub title" name="home_slider_subtitle[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-4 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-slider-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- falaaq store --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Falaaq store') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Logo')}}</label>
						<div class="col-md-10">
							<div class="input-group " data-toggle="aizuploader" data-type="image">
		                        <div class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
		                        </div>
		                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
								<input type="hidden" name="types[]" value="falaaq_store_logo">
		                        <input type="hidden" name="falaaq_store_logo" class="selected-files" value="{{ get_setting('falaaq_store_logo') }}">
		                    </div>
							<div class="file-preview"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Text')}}</label>
						<div class="col-md-10">
							<input type="hidden" name="types[]" value="falaaq_store_text">
							<textarea class="form-control" name="falaaq_store_text">{{ get_setting('falaaq_store_text') }}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Products')}}</label>
						<div class="col-md-10">
							<input type="hidden" name="types[]" value="falaaq_store_products">
							<select name="falaaq_store_products[]" class="form-control aiz-selectpicker" multiple data-live-search="true" data-selected-text-format="count" required>
								@foreach(filter_products(\App\Product::query())->get() as $product)
									<option value="{{$product->id}}" @if(in_array($product->id, json_decode(get_setting('falaaq_store_products')))) selected @endif>{{ $product->getTranslation('name') }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- Home Banner 1 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Banner 1 (Max 3)') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Banner & Links') }}</label>
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="home_banner1_images">
							<input type="hidden" name="types[]" value="home_banner1_links">
							@if (get_setting('home_banner1_images') != null)
								@foreach (json_decode(get_setting('home_banner1_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-5">
											<div class="input-group" data-toggle="aizuploader" data-type="image">
				                                <div class="input-group-prepend">
				                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
				                                </div>
				                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
												<input type="hidden" name="types[]" value="home_banner1_images">
				                                <input type="hidden" name="home_banner1_images[]" class="selected-files" value="{{ json_decode(get_setting('home_banner1_images'), true)[$key] }}">
				                            </div>
				                            <div class="file-preview box sm">
				                            </div>
										</div>
										<div class="col">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_banner1_links">
												<input type="text" class="form-control" placeholder="http://" name="home_banner1_links[]" value="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								@endforeach
							@endif
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm mt-3"
							data-toggle="add-more"
							data-content='
							<div class="row gutters-5">
								<div class="col-5">
									<div class="input-group" data-toggle="aizuploader" data-type="image">
										<div class="input-group-prepend">
											<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
										</div>
										<div class="form-control file-amount">{{ translate('Choose File') }}</div>
										<input type="hidden" name="types[]" value="home_banner1_images">
										<input type="hidden" name="home_banner1_images[]" class="selected-files">
									</div>
									<div class="file-preview box sm">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_banner1_links">
										<input type="text" class="form-control" placeholder="http://" name="home_banner1_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-banner1-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- Big banner --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Big banner') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Background image')}}</label>
						<div class="col-md-10">
							<div class="input-group " data-toggle="aizuploader" data-type="image">
		                        <div class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
		                        </div>
		                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
								<input type="hidden" name="types[]" value="big_banner_bg">
		                        <input type="hidden" name="big_banner_bg" class="selected-files" value="{{ get_setting('big_banner_bg') }}">
		                    </div>
							<div class="file-preview"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Logo image')}}</label>
						<div class="col-md-10">
							<div class="input-group " data-toggle="aizuploader" data-type="image">
		                        <div class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
		                        </div>
		                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
								<input type="hidden" name="types[]" value="big_banner_logo">
		                        <input type="hidden" name="big_banner_logo" class="selected-files" value="{{ get_setting('big_banner_logo') }}">
		                    </div>
							<div class="file-preview"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Link')}}</label>
						<div class="col-md-10">
							<div class="from-group">
								<input type="hidden" name="types[]" value="big_banner_link">
								<input type="text" class="form-control" name="big_banner_link" value="{{ get_setting('big_banner_link') }}">
								<small>{{ translate('Input link with http:// or https://') }}</small>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- Home categories--}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Categories') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Categories') }}</label>
						<div class="home-categories-target">
							<input type="hidden" name="types[]" value="home_categories">
							@if (get_setting('home_categories') != null)
								@foreach (json_decode(get_setting('home_categories'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<select class="form-control aiz-selectpicker" name="home_categories[]" data-live-search="true" data-selected={{ $value }} required>
													@foreach (\App\Category::where('parent_id', 0)->with('childrenCategories')->get() as $category)
														<option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
														@foreach ($category->childrenCategories as $childCategory)
															@include('categories.child_category', ['child_category' => $childCategory])
														@endforeach
													@endforeach
					                            </select>
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								@endforeach
							@endif
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col">
									<div class="form-group">
										<select class="form-control aiz-selectpicker" name="home_categories[]" data-live-search="true" required>
											@foreach (\App\Category::all() as $key => $category)
												<option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-categories-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- Home Banner 2 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Banner 2 (Max 3)') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Banner & Links') }}</label>
						<div class="home-banner2-target">
							<input type="hidden" name="types[]" value="home_banner2_images">
							<input type="hidden" name="types[]" value="home_banner2_links">
							@if (get_setting('home_banner2_images') != null)
								@foreach (json_decode(get_setting('home_banner2_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-5">
											<div class="input-group" data-toggle="aizuploader" data-type="image">
				                                <div class="input-group-prepend">
				                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
				                                </div>
				                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
												<input type="hidden" name="types[]" value="home_banner2_images">
				                                <input type="hidden" name="home_banner2_images[]" class="selected-files" value="{{ json_decode(get_setting('home_banner2_images'), true)[$key] }}">
				                            </div>
				                            <div class="file-preview box sm">
				                            </div>
										</div>
										<div class="col">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_banner2_links">
												<input type="text" class="form-control" placeholder="http://" name="home_banner2_links[]" value="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}">
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								@endforeach
							@endif
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm mt-3"
							data-toggle="add-more"
							data-content='
							<div class="row gutters-5">
								<div class="col-5">
									<div class="input-group" data-toggle="aizuploader" data-type="image">
										<div class="input-group-prepend">
											<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
										</div>
										<div class="form-control file-amount">{{ translate('Choose File') }}</div>
										<input type="hidden" name="types[]" value="home_banner2_images">
										<input type="hidden" name="home_banner2_images[]" class="selected-files">
									</div>
									<div class="file-preview box sm">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_banner2_links">
										<input type="text" class="form-control" placeholder="http://" name="home_banner2_links[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-banner2-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- Featured shops --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Featured shops') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Select Shops')}}</label>
						<div class="col-md-10">
							<input type="hidden" name="types[]" value="featured_shops">
							<select name="featured_shops[]" class="form-control aiz-selectpicker" multiple data-live-search="true" required>
								@foreach (\App\Seller::where('verification_status', 1)->get() as $key => $seller)
								@if($seller->user != null && $seller->user->shop != null){
									<option value="{{ $seller->user->shop->id }}" @if(in_array($seller->user->shop->id, json_decode(get_setting('featured_shops')))) selected @endif>{{ $seller->user->shop->name }}</option>
								@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- shop by brands --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Shop by brands') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Background image')}}</label>
						<div class="col-md-10">
							<div class="input-group " data-toggle="aizuploader" data-type="image">
		                        <div class="input-group-prepend">
		                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
		                        </div>
		                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
								<input type="hidden" name="types[]" value="shop_by_brands_bg">
		                        <input type="hidden" name="shop_by_brands_bg" class="selected-files" value="{{ get_setting('shop_by_brands_bg') }}">
		                    </div>
							<div class="file-preview"></div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Select Brands')}}</label>
						<div class="col-md-10">
							<input type="hidden" name="types[]" value="top10_brands">
							<select name="top10_brands[]" class="form-control aiz-selectpicker" multiple data-live-search="true" required>
								@foreach (\App\Brand::all() as $key => $brand)
									<option value="{{ $brand->id }}" @if(in_array($brand->id, json_decode(get_setting('top10_brands')))) selected @endif>{{ $brand->getTranslation('name') }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
		$(document).ready(function(){
		    AIZ.plugins.bootstrapSelect('refresh');
		});
    </script>
@endsection
