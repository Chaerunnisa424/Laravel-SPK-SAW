<?php $data = session('key'); ?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="">MENU</a>
            <a class="navbar-brand hidden" href=""><i class="menu-icon fa fa-meh-o"></i></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="home" style="display: none">
                    <a href="{{ url('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Home</a>
                </li>
                <li id="user" style="display: none">
                    <a href="{{ url('user') }}"> <i class="menu-icon fa fa-users"></i>User</a>
                </li>
                <li id="kost" style="display: none">
                    <a href="{{ url('kost') }}"> <i class="menu-icon fa fa-indent"></i>Alternatif</a>
                </li>
                <li id="kriteria" style="display: none">
                    <a href="{{ url('kriteria') }}"> <i class="menu-icon fa fa-bars"></i>Kriteria</a>
                </li>
                <li id="penilaian" style="display: none">
                    <a href="{{ url('penilaian') }}"> <i class="menu-icon fa fa-check-square"></i>Penilaian</a>
                </li>
                <li id="proses" style="display: none">
                    <a href="{{ url('proses') }}"> <i class="menu-icon fa fa-gears"></i>Proses spk</a>
                </li>
                <li id="laporan" style="display: none">
                    <a href="{{ url('laporan') }}"> <i class="menu-icon fa fa-print"></i>Laporan</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

<!-- NAVBAR -->

<div id="right-panel" class="right-panel">

    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <h4>Sistem Pendukung Keputusan</h4>
                    <h5>(Simple Additive Weighting)</h5>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{ asset('style/images/profile.png') }}">
                    </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ url('profile/' . $data[0]->id) }}"><i class="fa fa -cog"></i>Edit
                            Profile</a>

                        <a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-power -off"></i>Logout</a>
                    </div>
                </div>
                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true"
                        aria-expanded="true">
                    </a>
                </div>
            </div>
            <script>
                var data = <?php echo json_encode($data); ?>;

                if (data == '' || data == null) {
                    window.location.href = "/login";
                }
                data.forEach(element => {
                    if (element["role"] == "admin") {
                        $("#home").show();
                        $("#user").show();
                        $("#kost").show();
                        $("#kriteria").show();
                        $("#penilaian").show();
                        $("#proses").show();
                        $("#laporan").show();
                    } else {
                        $("#home").show();
                        $("#kost").show();
                        $("#kriteria").show();
                        $("#penilaian").show();
                        $("#proses").show();
                        $("#laporan").show();
                    }
                });
            </script>
