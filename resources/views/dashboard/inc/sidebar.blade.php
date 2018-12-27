<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
            @if(Auth::user()->tahap < 5)
                <li>
                    <a class="waves-effect waves-dark" href="/registrasi" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span class="hide-menu">Registrasi Awal</span></a>
                </li>
            @endif
            @if(Auth::user()->tahap == 5 && Auth::user()->jenis_mhs == 1)
                <li>
                    <a class="waves-effect waves-dark" href="/kartu" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">Kartu Peserta</span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="/pengumuman" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Pengumuman Kelulusan</span></a>
                </li>
            @endif
            @if(Auth::user()->tahap >= 6)
                <li>
                    <a class="waves-effect waves-dark" href="/registrasi_ulang" aria-expanded="false"><i class="mdi mdi-account-convert"></i><span class="hide-menu">Registrasi Ulang</span></a>
                </li>
            @endif
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>