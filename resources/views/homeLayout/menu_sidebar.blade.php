<div class="col-12 col-lg-4 col-xl-4">
    <div class="sidebar">
        <div class="sidebar-widget-list-inner">
            <ul>
                @foreach ($sidebar as $sb)
                    @php
                        $ret = array_reverse(susunParent($sb));
                        if ($sb->jenis == 'page' || $sb->jenis == 'route') {
                            if ($sb->jenis == 'page') {
                                $ret_link = 'page';
                            } else {
                                $ret_link = '';
                            }
                            foreach ($ret as $value) {
                                $ret_link = $ret_link . '/' . $value['slug'];
                            }
                            $ret_link = url($ret_link);
                        } elseif ($sb->jenis == 'link') {
                            $ret_link = $sb->key;
                        } else {
                            $ret_link = '#';
                        }
                    @endphp
                    <li><a href="{{ $ret_link }}">{{ $sb->name }}<i class="fa-solid fa-arrow-right-long"></i></a>
                    </li>
                @endforeach
            </ul><!-- ul -->
        </div><!-- sidebar-widget-list-inner -->
        {{-- <div class="sidebar-widget sidebar-widget-card">
            <div class="sidebar-widget-card-icon">
                <i class="flaticon-question"></i>
            </div>
            <div class="sidebar-widget-card-content">
                <h3><a href="contact.html">Get Any Help?</a></h3>
                <p>There are many variations of passages of lorem ipsum is simply free text available in
                    the marke.</p>
            </div>
        </div> --}}
        {{-- <div class="sidebar-widget">
            <div class="sidebar-widget-box-icon">
                <i class="flaticon-pdf"></i>
            </div>
            <div class="sidebar-widget-box-content">
                <h3>Company briefing update of the <br> 2024 year</h3>
                <a href="department-details.html" class="btn btn-primary">Download</a>
            </div>
        </div> --}}
    </div>
</div>
