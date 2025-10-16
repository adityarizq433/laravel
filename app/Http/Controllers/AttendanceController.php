<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $fillable = [
        'karyawan_id' => 'required|exists:employees,id', 
        'tanggal' => 'required|date',
        'status_absensi' => 'required|in:hadir,sakit,izin,alpha',
        'waktu_masuk' => 'nullable|date_format:H:i:s',
        'waktu_keluar' => 'nullable|date_format:H:i:s',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->get();
        return view('attendances.index', compact('attendances'));
    }
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|in:Hadir,Sakit,Izin,Alpha',
            'waktu_masuk' => 'required_if:status_absensi,Hadir|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
        ]);
        Attendance::create($request->all());
        return redirect()->route('attendances.index')->with('success', 'Data kehadiran berhasil ditambahkan.');
    }
    public function show(string $id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }
    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        $statuses = ['hadir', 'sakit', 'izin', 'cuti'];
        return view('attendances.edit', compact('attendance', 'employees', 'statuses'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:50',
        ]);
        $attendance->update($request->all());
        return redirect()->route('attendances.index')->with('success', 'Data kehadiran berhasil diperbarui.');
    }
    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Data kehadiran berhasil dihapus.');
    }
}
