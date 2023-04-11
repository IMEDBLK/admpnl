<?php


namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\AutoEcole;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;





class AutoEcoleController extends Controller
{
    public function index(Request $request)
    {
        // Récupération de tous les packs disponibles
        $packs = Pack::all();

        // Récupération de toutes les auto-écoles avec pagination
        $autoecoles = Autoecole::query();

        // Filtrage par pack si un pack est sélectionné dans la requête
        if ($request->filled('pack_id')) {
            $autoecoles->whereHas('pack', function ($query) use ($request) {
                $query->where('id', $request->input('pack_id'));
            });
        }

        $autoecoles = $autoecoles->paginate(2);

        return view('list_autoecole', compact('autoecoles', 'packs'));
    }


    public function create()
    {
        $packs = Pack::all();
        return view('ajouter_autoecole', compact('packs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'matricule_fiscale' => 'required',
            'email' => 'required|unique:auto_ecoles,email',
            'password' => 'required',
            'pack_id' => 'required',
            'date_activation_pack' => 'required'
        ]);

        $autoEcole = new AutoEcole();
        $autoEcole->nom = $validatedData['nom'];
        $autoEcole->adresse = $validatedData['adresse'];
        $autoEcole->matricule_fiscale = $validatedData['matricule_fiscale'];
        $autoEcole->email = $validatedData['email'];
        $autoEcole->password = Hash::make($validatedData['password']);
        $autoEcole->pack_id = $validatedData['pack_id'];
        $autoEcole->date_activation_pack = $validatedData['date_activation_pack'];
        $autoEcole->save();

        return redirect()->route('autoecoles.index')->with('success', 'Auto-école créée avec succès.');
    }

    public function edit(AutoEcole $autoEcole)
    {
        $packs = Pack::all();
        return view('modifier_autoecole', compact('autoEcole', 'packs'));
    }

    public function update(Request $request, AutoEcole $autoEcole)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'matricule_fiscale' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('auto_ecoles')->ignore($autoEcole->id)->where(function ($query) use ($autoEcole) {
                    return $query->where('email', '<>', $autoEcole->email);
                })
            ],
            'password' => 'nullable',
            'pack_id' => 'required',
            'date_activation_pack' => 'required'
        ]);

        $autoEcole->nom = $validatedData['nom'];
        $autoEcole->adresse = $validatedData['adresse'];
        $autoEcole->matricule_fiscale = $validatedData['matricule_fiscale'];
        $autoEcole->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $autoEcole->password = Hash::make($validatedData['password']);
        }
        $autoEcole->pack_id = $validatedData['pack_id'];
        $autoEcole->date_activation_pack = $validatedData['date_activation_pack'];

        $autoEcole->save(); // Sauvegarder les modifications sur l'objet existant

        return redirect()->route('autoecoles.index')->with('success', 'Auto-école modifiée avec succès.');
    }

    public function destroy($id)
{
    $autoecole = Autoecole::findOrFail($id);
    $autoecole->delete();

    return redirect()->route('autoecoles.index')->with('success', 'L\'auto-école a été supprimée avec succès.');
}
public function exportToExcel($id)
{
    $autoEcole = AutoEcole::find($id); // récupérer les données de l'auto-école spécifiée par l'ID
    if (!$autoEcole) {
        abort(404); // gérer le cas où l'auto-école n'existe pas
    }

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Écrire les en-têtes de colonnes
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nom');
    $sheet->setCellValue('C1', 'Adresse');
    $sheet->setCellValue('D1', 'Téléphone');
    $sheet->setCellValue('E1', 'Email');

    // Écrire les données de l'auto-école dans les cellules correspondantes
    $sheet->setCellValue('A2', $autoEcole->id);
    $sheet->setCellValue('B2', $autoEcole->nom);
    $sheet->setCellValue('C2', $autoEcole->adresse);
    $sheet->setCellValue('D2', $autoEcole->telephone);
    $sheet->setCellValue('E2', $autoEcole->email);

    $writer = new Xlsx($spreadsheet);
    $filename = 'autoecoles.xlsx';
    $writer->save($filename);

    // Ajouter les en-têtes HTTP pour forcer le téléchargement du fichier
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    // Envoyer le contenu du fichier au navigateur pour téléchargement
    readfile($filename);
    exit;

}
}
