<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/Biaya.php");


class BiayaDetail extends Biaya
{
    public function __construct()
    {
        include "construct.php";
    }

  function index()
  {
    // $data['Allbiaya'] = $this->GetBiaya();
    // $data['biayaDetail'] = $this->Biaya->GetBiayaDetail();
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
    //print_r($data);
    $this->load->view('media', $data);
  }

  function TambahBiayaDetail()
  {
    $now = date('Y-m-d H:i:s');
    $data = [
        # alt + Shift + bawah > untuk copy data ke baris bawah
        # alt + bawah/atas > untuk memindahkan data baris atas ke bawah
        # contoh harcode param...
        # 'Deskripsi'     => "contoh harcode param", 
        'Biaya_ID'     => $this->input-> post ('txtBiaya'),
        'Jenjang'       => $this->input-> post ('txtJenjang'),
        'Gelombang'       => $this->input-> post ('txtGelombang'),
        'Nominal'       => $this->input-> post ('txtNominal'),
        'Ketentuan'       => $this->input-> post ('txtKetentuan'),
        'StartDate'       => $this->input-> post ('txtStartDate'),
        'EndDate'       => $this->input-> post ('txtEndDate'),
        'CreatedBy'     => "DEPRA", //$this->input-> post ('CreatedBy'),
        'CreatedDate'   => $now,
        'ModifiedBy'    => $this->input-> post ('ModifiedBy'), //belum diset
        'ModifiedDate'  => $now,
        'AR-KEY'        => $this->key,
    ];
    # contoh ditulis dengan array...
    // array(
    //     'AR-KEY'        => $this->key,
    //     'Deskripsi'     => $this->input-> post ('txtDeskripsi'),
    //     'Jenjang'       => $this->input-> post ('txtJenjang'),
    //     'CreatedBy'     => $this->input-> post ('CreatedBy'),
    //     'CreatedDate'   => $this->input-> post ('CreatedDate'),
    //     'ModifiedBy'    => $this->input-> post ('ModifiedBy'),
    //     'ModifiedDate'  => $this->input-> post ('ModifiedDate')
    // );
    $insert = $this->curl->simple_post($this->API.'/biaya_detail/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($insert)
    {
        $this->session->set_flashdata('hasil','Insert Data Berhasil');
    }else
    {
        $this->session->set_flashdata('hasil','Insert Data Gagal');
    }
    redirect('biayadetail?modul=masterBiayaDetail&act=Tambah');
    }

    function Hapus($Biaya_Detail_ID)
    {
        $delete =  $this->curl->simple_delete
        ($this->API.'/biaya_detail/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_Detail_ID));
        redirect('biayadetail?modul=masterBiayaDetail&act=Tambah');
    }
}