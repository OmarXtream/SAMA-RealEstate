<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    protected $fillable = ['type','fund_id','request_id','status','monthly',
    'timeLeft','paymentLeft','payCheckFile','Bank','property','dateToVisit',
    'bank1','bank2','bank3','bank4','bank5','bank6','bank7','details',
];


    public function delegate()
    {
        return $this->belongsTo(Delegate::class);
    }

    public function request()
    {
        if($this->type == 1){
        return $this->belongsTo(InfoForm::class,'fund_id');
        }else{
        return $this->belongsTo(PropertiesRequests::class,'request_id');
        }
    }

    public function pStatus()
    {
        if ($this->status === 1){
            return '<span class="badge badge-pill progress-bar-info">جمع المعلومات</span>';
        }elseif ($this->status === 2){
            return '<span class="badge badge-pill progress-bar-warning">اعتماد بيانات التمويل والبنك</span>';
        }elseif ($this->status === 3){
            return '<span class="badge badge-pill progress-bar-danger">معاينة واختيار العقار</span>';
        }else{
            return '<span class="badge badge-pill progress-bar-success">تم التنفيذ</span>';
        }
    }

    public function typeText(){
        switch ($this->type) {
            case 1:
                return 'طلب تمويلي';
                break;
            case 2:
                return 'طلب عقاري';
                break;
            default:
              echo "غير معرف";
          }
    }
}
