<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController as Dashboard;

use App\Http\Controllers\Master\SatuanController as Satuan;
use App\Http\Controllers\Master\GudangController as Gudang;
use App\Http\Controllers\Master\PenjualanController as Penjualan;

use App\Http\Controllers\SupplierController as Supplier;

use App\Http\Controllers\Transaksi\JualController as Jual;
use App\Http\Controllers\Transaksi\BeliController as Beli;

use App\Http\Controllers\AuthenController as Authen;

use App\Http\Controllers\SuperAdminController as SuperAdmin;

use App\Http\Controllers\OwnerController as Owner;

use App\Http\Controllers\KasirController as Kasir;

Route::middleware('guest')->group(function(){
	
	Route::prefix('login')->name('login')->group(function(){
		Route::get('',[Authen::class,'login']);
		Route::post('post',[Authen::class,'post'])->name('.post');
	});

});

Route::middleware('auth')->group(function(){
	
	Route::post('logout',[Authen::class,'logout'])->name('logout');

	Route::get('/',[Dashboard::class,'index'])->name('index');

	Route::prefix('superadmin')->name('superadmin')->group(function(){
		Route::get('',[SuperAdmin::class,'index']);
	});

	Route::prefix('owner')->name('owner')->group(function(){
		Route::get('',[Owner::class,'index']);
	});
	
	Route::prefix('kasir')->name('kasir')->group(function(){
		Route::get('',[Kasir::class,'index']);
	});

	//owner dan super admin
	Route::prefix('master')->name('master')->group(function(){
		Route::prefix('satuan')->name('.satuan')->group(function(){
			Route::get('',[Satuan::class,'index'])->name('.index');
			Route::get('add',[Satuan::class,'add'])->name('.add');
			Route::post('create',[Satuan::class,'create'])->name('.create');
			Route::get('update/{id}',[Satuan::class,'update'])->name('.update');
			Route::patch('update/{id}',[Satuan::class,'patch'])->name('.patch');
			Route::delete('delete/{id}',[Satuan::class,'delete'])->name('.delete');
		});

		Route::prefix('gudang')->name('.gudang')->group(function(){
			Route::get('',[Gudang::class,'index'])->name('.index');
			Route::get('add',[Gudang::class,'add'])->name('.add');
			Route::post('create',[Gudang::class,'create'])->name('.create');
			Route::get('update/{id}',[Gudang::class,'update'])->name('.update');
			Route::patch('update/{id}',[Gudang::class,'patch'])->name('.patch');
			Route::delete('delete/{id}',[Gudang::class,'delete'])->name('.delete');
		});

		Route::prefix('penjualan')->name('.penjualan')->group(function(){
			Route::get('',[Penjualan::class,'index'])->name('.index');
			Route::get('add',[Penjualan::class,'add'])->name('.add');
			Route::post('create',[Penjualan::class,'create'])->name('.create');
			Route::get('update/{id}',[Penjualan::class,'update'])->name('.update');
			Route::patch('update/{id}',[Penjualan::class,'patch'])->name('.patch');
			Route::delete('delete/{id}',[Penjualan::class,'delete'])->name('.delete');

			Route::prefix('bahan')->name('.bahan')->group(function(){
				Route::get('{id}',[Penjualan::class,'bahan']);
				Route::get('{id}/add',[Penjualan::class,'bahan_add'])->name('.add');
				Route::post('{id}/post',[Penjualan::class,'bahan_post'])->name('.post');
			});

		});
	});

	Route::prefix('supplier')->name('.supplier')->group(function(){
		Route::get('',[Supplier::class,'index'])->name('.index');
	});

	Route::prefix('stok')->name('.stok')->group(function(){
		
		Route::prefix('jual')->name('.jual')->group(function(){
			Route::get('',[Jual::class,'index'])->name('.index');
		});

		Route::prefix('beli')->name('.beli')->group(function(){
			Route::get('',[Jual::class,'index'])->name('.index');
		});

	});

});