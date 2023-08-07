<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Food Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Food Items</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card">
                    <div class="card-body">
                    <form method="POST" action="{{ route('admin.food-items.update' ,$foodItem->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf @method('PUT')
                        <div class="form-group">
                        <label for="name">   {{ __('Name *') }}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder ="Blog Name" value="{{ old('name'  ,$foodItem->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="menu_id">   {{ __(' Menu') }}</label>
                        <select name="menu_id" class="form-control">
                          <option value=""> Select menu</option>
                              @foreach( $menus as  $key=> $category)
                                   <option value="{{$key}}" @if($foodItem->menu->id == $key) selected @endif>{{ $category}}</option>
                                 @endforeach
                                    </select>
                            @error('menu_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="product_image">   {{ __('Logo Image') }}</label>
                            <input type="file" name="product_image" id="product_image"  class="form-control dropify" data-default-file="{{ url('/storage/products/'.$foodItem->image.'') }}" >
                            @error('product_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="description"> {{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control summernote" placeholder="Enter Description" >{{ old('description',$foodItem->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="price">   {{ __('Price') }}</label>
                        <input type="number" class="form-control" min="1" max="1000" name="price" placeholder="Enter Price" value="{{old('price',$foodItem->price )}}" >
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_description"> {{ __('Featured') }}</label>
                        <input type="checkbox" value="1"  name="featured"  {{ old('featured' ,$foodItem->featured) == 1 ? 'checked' : '' }}  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            @error('featured')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">   {{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value= '1' {{ old('status' ,$foodItem->status) == '1' ? 'selected' : '' }}>Active</option>
                             <option value=0 {{ old('status' ,$foodItem->status) == '0' ? 'selected' : '' }}>Inactive
                        </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        </form>
                    </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>