<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Orders </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
              </div>
                        <div class="card-body">
                            <table id="manage_orders" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                    <tr>
                                 <th>Order Id </th>
                                <th>Order Date</th>
                                 <th>Order Types</th>
                                 <th>Payment status</th>
                             <th>Customer</th>
                                 <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $key=>  $order)
                                        <tr order_uid ="{{ $order->id }}">
                                            <td class="">
                                                <div class="badge bg-primary">
                                                    <a href="https://restaurant-management.infyom.com/restaurant/order-details/52" class="text-decoration-none text-white ">{{ $order->id }}</a>
                                                </div>
                                            </td>
                                            <td>   {{ __( date("d M ,Y", strtotime($order->order_date)) ) }} ({{ __( DateTime::createFromFormat('H:i:s',explode(' ', $order->order_date )[1])->format('h:i:s A') ) }} )</td>

                                            <td class="" >
                                                {{ $order->order_type }}
                                            </td>
                                            <td class="" >
                                                @if(isset($order) && isset($order->payment) && isset($order->payment->payment_amount))
                                                    {{ $order->payment->payment_method }}
                                                @endif
                                            </td>
                                            <td class="">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex flex-column">
                                                        {{ (Auth::guard('user')->check()) ?'xzcxzcxzc' :$order->full_name }}

                                                        <span class="mb-1 text-decoration-none fs-6">                                                            {{ (Auth::guard('user')->check()) ?'xzcxzcxzc' :$order->email_address }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{ route('admin.order.show' , $order->id) }}"><i class="fa-solid fa-eye"></i>  </a>

                                                @if( $order->status =='Pending')
                                                    <a href="javascript:void(0)" id="append_pop_ups"  class="btn btn-info btn-sm" order_uid = "{{ $order->id }}">
                                                        <i class="fa-solid fa-plus" title="Accept" ></i>
                                                    </a>
                                                @endif
                                                @if( $order->status =='Processing')
                                                    <input type="hidden" name="ajax_value" id="ajax_value" value="{{ route('admin.order.ChangeOrderStatus') }}">
                                                    <a href="javascript:void(0)" id="ChangeOrderStatus"  class="btn btn-info btn-sm" order_uid = "{{ $order->id }}">
                                                        <i class="fa-solid fa-minus" title="Accept" ></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <div class="order_data">
                                                @include('admin.page.order.includes.order_accept')

                                            </div>
                                        </tr>


                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

</x-admin-app-layout>
