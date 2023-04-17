<?php


namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\AutoEcole;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Database\Eloquent\Collection;

class AutoEcoleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = intval($request->input('perPage', 5));// nombre d'éléments à afficher par page

        $query = AutoEcole::query(); // Modifier le nom de la classe ici

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('region', 'like', "%$search%")
                    ->orWhere('matricule_fiscale', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $sql = $query->with('pack')->orderBy('id')->toSql(); // Here we use toSql()

        $autoecoles = $query->with('pack')->orderBy('id')->paginate($perPage);

        return view('list_autoecole', compact('autoecoles', 'perPage', 'sql'));
    }



    public function create()
    {
        $packs = Pack::all();
        return view('ajouter_autoecole', compact('packs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'region' => 'required',
            'matricule_fiscale' => 'required|unique:autoecoles|max:255',
            'email' => 'required|email|unique:autoecoles|max:255',
            'password' => 'required|min:8',
            'pack_id' => 'required|exists:packs,id',
            'date_activation_pack' => 'required|date',
        ]);

        $autoecole = new Autoecole;
        $autoecole->nom = $validatedData['nom'];
        $autoecole->region = $validatedData['region'];
        $autoecole->matricule_fiscale = $validatedData['matricule_fiscale'];
        $autoecole->email = $validatedData['email'];
        $autoecole->password = Hash::make($validatedData['password']);
        $autoecole->pack_id = $validatedData['pack_id'];
        $autoecole->date_activation_pack = $validatedData['date_activation_pack'];
        $autoecole->save();

        return redirect()->route('autoecoles.index');
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
