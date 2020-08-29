<style>
.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
</style>
<table class="table table-borderless" style="border:none">
		<tbody>
            <tr>
			<td>Kode Organisasi</td><td>:</td><td><select style='width:153px' id='kodeorg'><option value=''></option><option value='ASPJ'>ASPJ</option><option value='ASPM'>ASPM</option><option value='ASSE'>ASSE</option><option value='ASUE'>ASUE</option><option value='ASHO'>ASHO</option><option value='ASRO'>ASRO</option><option value='BSLE'>BSLE</option><option value='BSHO'>BSHO</option><option value='BSRO'>BSRO</option><option value='BTLE'>BTLE</option><option value='BTHO'>BTHO</option><option value='BTLM'>BTLM</option><option value='BTRO'>BTRO</option><option value='KBKE'>KBKE</option><option value='KKHO'>KKHO</option><option value='KBME'>KBME</option><option value='KBHO'>KBHO</option><option value='KBRO'>KBRO</option><option value='BPTP'>BPTP</option><option value='KBSP'>KBSP</option><option value='KKBP'>KKBP</option><option value='MS1P'>MS1P</option><option value='MS2P'>MS2P</option><option value='MJSP'>MJSP</option><option value='MSLP'>MSLP</option><option value='MTMP'>MTMP</option><option value='MS3P'>MS3P</option><option value='KDDP'>KDDP</option><option value='MRBP'>MRBP</option><option value='SMKP'>SMKP</option><option value='BPSP'>BPSP</option><option value='UKBP'>UKBP</option><option value='MS1E'>MS1E</option><option value='MS2E'>MS2E</option><option value='MSHO'>MSHO</option><option value='RWKE'>RWKE</option><option value='RWHO'>RWHO</option><option value='RWKM'>RWKM</option><option value='RWRO'>RWRO</option><option value='STHO'>STHO</option><option value='STAE'>STAE</option><option value='WOAE'>WOAE</option><option value='WOHO'>WOHO</option></select>
			<code>*</code></td>
			<td>Jenis Biaya</td><td>:</td><td><select style='width:153px' id='jenisbiaya'><option value=''>Pilih Data</option><option value='1'>Biaya Langsung</option><option value='2'>Biaya Tidak Langsung</option></select>
			<code>*</code>
			</td><td><input type='hidden' id='penambah' class='input' onkeypress='return angka_doang(event)' size='20'></td>
		</tr>
        <tr>
			<td>Kode Asset</td><td>:</td>
			<td><input type='text' id='kodeaset' maxlength='20' class='input' onkeypress='return angka_doang(event)' style='width:150px' disabled=''></td>
			<input type='hidden' id='pengurang' class='input' onkeypress='return angka_doang(event)' size='20'>
			<td>Induk</td><td>:</td>
			<td><input id='induk' name='induk' class='input' type='text' onkeypress='return tanpa_kutip(event)' value='' maxlength='25' style='width:150px'>             
		</tr>
		<tr>
			<td>Kode Asset Lama</td><td>:</td>
			<td><input type='text' id='kodeasetlama' maxlength='64' class='input' style='width:150px'></td>
			<td>Nama Kelompok</td><td>:</td>
			<td><select style='width:153px' id='tipe' onchange='getSub()'><option value=''></option><option value='AB'>ALAT BERAT</option><option value='BG'>BANGUNAN</option><option value='PI'>INFRASTRUKTUR</option><option value='IV'>INVENTARIS</option><option value='KD'>KENDARAAN</option><option value='MS'>MESIN DAN INSTALASI</option><option value='TH'>TANAH</option><option value='TM'>TANAMAN MENGHASILKAN</option></select></td>
			
		</tr>
        <tr>
			<td>Tanggal Perolehan</td><td>:</td>
			<td><input type='text' class='input' id='tahunperolehan' onmousemove='setCalendar(this.id)' onkeypress='return false;' style='width:150px' maxlength='10' onchange='getPrdAwal(this)'><code>*</code></td>
			<td>Sub Tipe Asset</td><td>:</td>
			<td><select style='width:153px' id='sub' onchange='cek()'></select><code>*</code></td>
		</tr>
        <tr>
			<td>Harga Perolehan</td><td>:</td><td><input type='text' value='0' class='input' id='nilaiperolehan' onkeypress='return angka_doang(event);' onkeyup='z.numberFormat('nilaiperolehan')' style='width:150px' maxlength='15'></td>
			
			<td>Nama Asset</td><td>:</td><td><input type='text' id='kodebarang' onkeypress='return false;' onclick='showWindowBarang('Cari Barang',event);' class='input' style='width:100px' maxlength='11'><input type='text' id='namaaset' maxlength='45' class='input' onkeypress='return tanpa_kutip(event)' style='width:233px'>
			<code>*</code>
			</td>
		</tr>
		<tr>
			<td>Bulan awal penyusutan</td><td>:</td>
			<td><select style='width:153px' id='bulanawal'><option value=''></option><option value='2020-11'>11-2020</option><option value='2020-10'>10-2020</option><option value='2020-09'>09-2020</option><option value='2020-08'>08-2020</option><option value='2020-07'>07-2020</option><option value='2020-06'>06-2020</option><option value='2020-05'>05-2020</option><option value='2020-04'>04-2020</option><option value='2020-03'>03-2020</option><option value='2020-02'>02-2020</option><option value='2020-01'>01-2020</option></select></td>
			<td>Keterangan</td><td>:</td><td><input type='text' class='input' id='keterangan' style='width:337px' maxlength='100' onkeypress='return tanpa_kutip(event)'></td>
		</tr>
		<tr>
			<td>Status</td><td>:</td><td><select style='width:153px' id='status'><option value=''>Pilih Data</option><option value='1'>Active</option><option value='23'>Converted to Components</option><option value='13'>Destroy and Dump</option><option value='14'>Donate to Charity</option><option value='21'>Obsolete</option><option value='11'>Sell</option><option value='22'>Stolen</option><option value='12'>Trade-In</option><option value='15'>Transfer to other Departement</option><option value='25'>Uneconomic to Repair</option><option value='24'>Unrepairable</option></select><code>*</code></td>
			<td>Jlh Bln Penyusutan</td><td>:</td>
			<td><input type='text' value='0' class='input' id='jumlahbulan' onkeypress='return angka_doang(event);' size='9' maxlength='3'> /
				<input type='text' value='0' class='input' id='persendecline' onkeypress='return angka_doang(event);' size='5' maxlength='3'> %
			</td>
		</tr>
		<tr>
			<td>Tanggal Disposal</td><td>:</td>
			<td><input type='text' class='input' id='tanggaldisposal' onmousemove='setCalendar(this.id)' onkeypress='return false;' style='width:150px' maxlength='10' disabled=''></td>
			<td>Ref. Pembayaran</td><td>:</td>
			<td><input id='refbayar' name='refbayar' class='input' type='text' onkeypress='return tanpa_kutip(event)' value='' maxlength='25' style='width:150px'></td>
		</tr>
		<tr>
			<td>Leasing</td><td>:</td>
			<td><select style='width:153px' id='leasing'><option value='0'>Not Leasing</option><option value='1'>Leasing</option><option value='2'>Ex-Leasing</option></select></td>
			<td>Posisi Asset</td><td>:</td>
			<td><select style='width:153px' id='posisiasset' onchange='changetipelokasi()'><option value=''>Pilih Data</option><option value='ASHO'>ASHO-AGRINA SAWIT PERDANA HEAD OFFICE</option><option value='ASPJ'>ASPJ-AGRINA SAWIT PERDANA - DERMAGA</option><option value='ASPM'>ASPM-AGRINA SAWIT PERDANA - MILL</option><option value='ASRO'>ASRO-AGRINA SAWIT PERDANA REGIONAL OFFICE</option><option value='ASSE'>ASSE-AGRINA SAWIT PERDANA - SELATAN</option><option value='ASUE'>ASUE-AGRINA SAWIT PERDANA - UTARA</option><option value='BPSP'>BPSP-KUD BENUA PALEM SAIH</option><option value='BPTP'>BPTP-KOPLAS BEKAL PETANI</option><option value='BSHO'>BSHO-BINTANG SAWIT LESTARI - HO</option><option value='BSLE'>BSLE-BINTANG SAWIT LESTARI - ESTATE</option><option value='BSRO'>BSRO-BINTANG SAWIT LESTARI - RO</option><option value='BTHO'>BTHO-BUMI TATA LESTARI - HO</option><option value='BTLE'>BTLE-BUMI TATA LESTARI - ESTATE</option><option value='BTLM'>BTLM-BUMI TATA LESTARI - MILL</option><option value='BTRO'>BTRO-BUMI TATA LESTARI - RO</option><option value='KBHO'>KBHO-KARYA BOGA MITRA - HO</option><option value='KBKE'>KBKE-KARYA BOGA KUSUMA - ESTATE</option><option value='KBME'>KBME-KARYA BOGA MITRA - ESTATE</option><option value='KBRO'>KBRO-KARYA BOGA MITRA - RO</option><option value='KBSP'>KBSP-KOPLAS KERABAT BERSATU</option><option value='KDDP'>KDDP-KSHD KEDONDONG</option><option value='KKBP'>KKBP-KOPLAS KUNGKANG BERSATU</option><option value='KKHO'>KKHO-KARYA BOGA KUSUMA - HO</option><option value='MJSP'>MJSP-KOPLAS MITRA JAYA SEJAHTERA</option><option value='MRBP'>MRBP-KSHD MARIBAS</option><option value='MS1E'>MS1E-MUTIARA SAWIT SELUMA - ESTATE 1</option><option value='MS1P'>MS1P-KOPLAS MANUNGGAL</option><option value='MS2E'>MS2E-MUTIARA SAWIT SELUMA - ESTATE 2</option><option value='MS2P'>MS2P-KOPLAS MANUNGGAL JAYA</option><option value='MS3P'>MS3P-KOPLAS TRICUKO JAYA</option><option value='MSHO'>MSHO-MUTIARA SAWIT SELUMA - HO</option><option value='MSLP'>MSLP-KOPLAS MITRA SEJATE LESTARI</option><option value='MTMP'>MTMP-KOPLAS MITRA TANI MANUNGGAL</option><option value='RWHO'>RWHO-RANA WASTU KENCANA - HO</option><option value='RWKE'>RWKE-RANA WASTU KENCANA - ESTATE</option><option value='RWKM'>RWKM-RANA WASTU KENCANA - MILL</option><option value='RWRO'>RWRO-RANA WASTU KENCANA - RO</option><option value='SMKP'>SMKP-KSHD SEMERIUK</option><option value='STAE'>STAE-SYARIKAT TANDIKAT ADIDAYA 88 - ESTATE</option><option value='STHO'>STHO-SYARIKAT TANDIKAT ADIDAYA - HO</option><option value='UKBP'>UKBP-KUD USAHA KARYA BERSAMA</option><option value='WOAE'>WOAE-WORLD ONE AGRO - ESTATE</option><option value='WOHO'>WOHO-WORLD ONE AGRO - HO</option></select></td>
		</tr>
		<tr>
			<td>No. Dok. Pengadaan</td><td>:</td>
			<td><input id='nodokpengadaan' name='nodokpengadaan' class='input' type='text' onkeypress='return tanpa_kutip(event)' value='' maxlength='25' style='width:150px'>             
			<td>Tipe Lokasi Asset</td><td>:</td>
			<td><select style='width:153px' id='tipelokasiasset'></select></td>
		</tr>
		<tr>
			<td>No Mesin</td><td>:</td><td><input type='text' class='input' id='nomesin' style='width:150px' onkeypress='return tanpa_kutip(event)'></td>
			<td>No Rangka</td><td>:</td><td><input type='text' class='input' id='norangka' style='width:150px' onkeypress='return tanpa_kutip(event)'></td>
		</tr>
	<tr>
        <td></td>
        <td></td>
        <td>
            <input type='hidden' value='insert' id='method'>
            <button class='btn btn-primary' onclick='simpanAssetBaru()'>Simpan</button>
            <button class='btn btn-default' onclick='cancelAsset()'>Batal</button>
        </td>
    </tr>
    <tr>
                <td colspan=7><code>* Required</code></td>
            </tr>
    </tbody>
</table>