<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Variabel Filter
$authFilter = ['filter' => 'auth'];

// Variabel Role
$admin     = ['filter' => 'role:admin'];
$user     = ['filter' => 'role:user'];
$allRole   = ['filter' => 'role:admin, user'];

// Login
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Halaman utama
$routes->get('/', 'Home::index', $authFilter);
$routes->get('/dashboard', 'Home::index', $authFilter);

$routes->get('/users/create', 'Users::create'); // form tambah user
$routes->post('/users/store', 'Users::store'); // aksi simpan user

$routes->get('/users', 'Users::index', $allRole); // menampilkan data user
$routes->get('/users/edit/(:num)', 'Users::edit/$1', $allRole); // form edit user
$routes->post('/users/update/(:num)', 'Users::update/$1', $allRole); // aksi update user
$routes->get('/users/delete/(:num)', 'Users::delete/$1', $allRole); // aksi hapus user

$routes->get('/tanggapan', 'Tanggapan::index');
$routes->get('/tanggapan/create/(:num)', 'Tanggapan::create/$1');
$routes->post('/tanggapan/store', 'Tanggapan::store');
$routes->get('/tanggapan/delete/(:num)', 'Tanggapan::delete/$1');
$routes->get('/tanggapan/edit/(:num)', 'Tanggapan::edit/$1'); // Jalur untuk buka form edit
$routes->post('/tanggapan/update/(:num)', 'Tanggapan::update/$1'); // Jalur untuk proses simpan editan
$routes->get('/tanggapan/detail_pengaduan/(:num)', 'Tanggapan::detail_pengaduan/$1');

$routes->get('/pengaduan', 'Pengaduan::index');
$routes->get('/pengaduan/create', 'Pengaduan::create');
$routes->post('/pengaduan/store', 'Pengaduan::store');
$routes->get('/pengaduan/delete/(:num)', 'Pengaduan::delete/$1');
$routes->get('/pengaduan/detail/(:num)', 'Pengaduan::detail/$1');



$routes->get('/penugasan', 'Penugasan::index');
// Tambahkan baris ini (tanpa ID)
$routes->get('/penugasan/create', 'Penugasan::create'); 
// Ini tetap untuk yang dari tombol detail
$routes->get('/penugasan/create/(:num)', 'Penugasan::create/$1'); 

$routes->post('/penugasan/store', 'Penugasan::store');
$routes->get('/penugasan/from-tanggapan/(:num)', 'Penugasan::createFromTanggapan/$1');