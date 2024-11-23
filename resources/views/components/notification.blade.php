<div class="menu-item dropdown dropdown-mobile-full">
    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
      <div class="menu-icon">
        <i class="bi bi-bell nav-icon"></i>
      </div>

      @if ($notifications->count() > 0)
        <div class="menu-badge bg-theme"></div>  
      @endif

    </a>
    <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
        <h6 class="dropdown-header fs-10px mb-1">NOTIFICATIONS</h6>
        <div class="dropdown-divider mt-1"></div>

        @if ($notifications->count() > 0)

            @foreach ($notifications as $notification)
                <a href="{{route('admin.notification.read_notification', $notification->id)}}" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
                    <div class="fs-20px">
                        <i class="bi bi-calendar3 text-theme"></i>
                    </div>
                    <div class="flex-1 flex-wrap ps-3">
                        <div class="mb-1 text-inverse">{{$notification->title}}</div>
                        <div class="small text-inverse text-opacity-50">{{$notification->created_at->format('d-m-Y')}}</div>
                    </div>
                    <div class="ps-2 fs-16px">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>
            @endforeach
            
        @else
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
                <div class="fs-20px">
                    <i class="bi bi-0-circle text-theme"></i>
                </div>
                <div class="flex-1 flex-wrap ps-3">
                    <div class="mb-1 text-inverse">NO NEW NOTIFICATIONS</div>
                </div>
                <div class="ps-2 fs-16px">
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        @endif
        

    </div>
</div>