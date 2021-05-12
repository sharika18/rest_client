<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include_once (dirname(__FILE__) . "/Biaya.php");


class BiayaDetail extends Biaya
{
    public $success = "Data Berhasil";
    public $error = "Data Gagal";
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

  function GetID($Biaya_Detail_ID = '')
  {
    $get_apiEditBiayaDetail = json_decode($this -> curl -> simple_get ($this->API.'/vw_biaya_detail/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_Detail_ID) ),true);
    $data['editBiayaDetail'] = $get_apiEditBiayaDetail['data'];
    //print_r($data);
    $data['biaya'] = $this->GetBiaya();
    $data['biayaDetail'] = $this->GetBiayaDetail();
    $this->load->view('media', $data);
  }

  function TambahBiayaDetail()
  {
    $now = date('Y-m-d H:i:s');
    $data = [
        'Biaya_ID'     => $this->input-> post ('txtBiaya'),
        'Jenjang'       => $this->input-> post ('txtJenjang'),
        'Gelombang'     => $this->input-> post ('txtGelombang'),
        'Nominal'       => $this->input-> post ('txtNominal'),
        'Ketentuan'     => $this->input-> post ('txtKetentuan'),
        'StartDate'     => $this->input-> post ('txtStartDate'),
        'EndDate'       => $this->input-> post ('txtEndDate'),
        'CreatedBy'     => "DEPRA", //$this->input-> post ('CreatedBy'),
        'CreatedDate'   => $now,
        'ModifiedBy'    => $this->input-> post ('ModifiedBy'), //belum diset
        'ModifiedDate'  => $now,
        'AR-KEY'        => $this->key,
    ];
    $insert = $this->curl->simple_post($this->API.'/biaya_detail/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    if($insert)
    {
        $this->session->set_flashdata('success',$this->success.' Disimpan');
    }else
    {
        $this->session->set_flashdata('error',$this->error.' Disimpan');
    }
    redirect('biayadetail?modul=masterBiayaDetail&act=Tambah');
    }

    function EditBiayaDetail()
    {
      $now = date('Y-m-d H:i:s');
      $data = array(
          # alt + Shift + bawah > untuk copy data ke baris bawah
          # alt + bawah/atas > untuk memindahkan data baris atas ke bawah
          # contoh harcode param...
          # 'Deskripsi'     => "contoh harcode param", 
          'id'            => $this->input-> post ('txtID'),
          'Biaya_ID'      => $this->input-> post ('txtBiaya'),
          'Jenjang'       => $this->input-> post ('txtJenjang'),
          'Gelombang'     => $this->input-> post ('txtGelombang'),
          'Nominal'       => $this->input-> post ('txtNominal'),
          'Ketentuan'     => $this->input-> post ('txtKetentuan'),
          'StartDate'     => $this->input-> post ('txtStartDate'),
          'EndDate'       => $this->input-> post ('txtEndDate'),
          'CreatedBy'     => "DEPRA", //$this->input-> post ('CreatedBy'),
          'CreatedDate'   => $now,
          'ModifiedBy'    => $this->input-> post ('ModifiedBy'), //belum diset
          'ModifiedDate'  => $now,
          'AR-KEY'        => $this->key,
      );
      $update = $this->curl->simple_put($this->API.'/biaya_detail/', $data, array(CURLOPT_BUFFERSIZE => 10)); 
      if($update)
      {
          $this->session->set_flashdata('success',$this->success.' Diubah');
      }else
      {
          $this->session->set_flashdata('error',$this->error.' Diubah');
      }
      redirect('biayadetail?modul=masterBiayaDetail&act=Tambah');
    }

    function HapusBiayaDetail($Biaya_Detail_ID)
    {
        $delete =  $this->curl->simple_delete
        ($this->API.'/biaya_detail/', array('AR-KEY'=>$this->key, 'id'=>$Biaya_Detail_ID));
        if($delete)
        {
            $this->session->set_flashdata('success',$this->success.' Dihapus');
        }else
        {
            $this->session->set_flashdata('error',$this->error.' Dihapus');
        }
        redirect('biayadetail?modul=masterBiayaDetail&act=Tambah');
    }
}