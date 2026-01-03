<?php
namespace App\Exports;
use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Participant::with('category')->get()->map(function($p){
            return [
                'id' => $p->id,
                'name' => $p->full_name,
                'email' => $p->email,
                'phone' => $p->phone,
                'category' => $p->category?->name,
                'status' => $p->status,
                'created_at' => $p->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID','Nama','Email','Phone','Kategori','Status','Didaftar Pada'];
    }
}
