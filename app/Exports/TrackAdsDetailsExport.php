<?php

namespace App\Exports;

use App\Models\TrackAdsDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\
class TrackAdsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * جمع البيانات التي سيتم تصديرها
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // جلب أول 20 عنصر من جدول TrackAdsDetails
        return TrackAdsDetails::limit(20)->get();
    }

    /**
     * إضافة رؤوس الأعمدة
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Track Ad ID',
            'Provider',
            'Ad Type',
            'Ad Shown',
            'App Info',
            'IP Info',
            'User Agent',
            'Browser',
            'Device',
            'Operating System',
            'Shown At',
            'Created At',
            'Updated At',
            'Ad Info',
        ];
    }

    /**
     * تخصيص كيفية تصدير البيانات لكل صف
     *
     * @param \App\Models\TrackAdsDetail $detail
     * @return array
     */
    public function map($detail): array
    {
        return [
            $detail->id,
            $detail->track_ad_id,
            $detail->provider,
            $detail->ad_type,
            $detail->ad_shown,
            $detail->app_info,
            $detail->ip_info,
            $detail->user_agent,
            $detail->browser,
            $detail->device,
            $detail->operating_system,
            $detail->shown_at,
            $detail->created_at,
            $detail->updated_at,
            $detail->ad_info,
        ];
    }
}
