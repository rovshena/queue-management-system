<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class QueueController extends Controller
{
    public function __invoke(Request $request)
    {
        $counter = Queue::where('created_at', '>=', Carbon::today())->max('counter');
        $counter++;

        $queue = Queue::create(['counter' => $counter]);

        try {

            $printer_ip_address = env('PRINTER_IP_ADDRESS', '127.0.0.1');
            $printer_share_name = env('PRINTER_SHARE_NAME', 'ReceiptPrinter');

            $connector = null;
            $connector = new WindowsPrintConnector("smb://$printer_ip_address/$printer_share_name");

            $printer = new Printer($connector);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setTextSize(1, 2);
            $printer->text('Пробирная палата Туркменистана' . PHP_EOL);
            $printer->setTextSize(1, 1);
            $printer->feed(1);
            $printer->text('Номер талона');
            $printer->feed(2);
            $printer->setTextSize(8, 8);
            $printer->text($queue->counter);
            $printer->feed(2);
            $printer->setTextSize(1, 2);
            $printer->text($queue->created_at->format('d.m.Y - H:i:s') . PHP_EOL);
            $printer->selectPrintMode();
            $printer->text('ул. Героя Туркменистана' . PHP_EOL);
            $printer->text('Атамурата Ниязова, 154' . PHP_EOL);
            $printer->cut();
            $printer->feedForm();
            $printer->close();

        } catch (\Exception $e) {
            return back()->with('error', 'Tehniki näsazlyk ýüze çykdy. Administratora ýüzlenmegiňizi haýyş edýäris!');
        }

        return redirect()->route('index');
    }
}
