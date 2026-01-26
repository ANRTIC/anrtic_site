<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function motDG(Request $request, $code = "mot-dg")
    {
        $page = Page::where("code", $code)->first();

        if ($request->isMethod("post")) {

            $validatedData = $request->validate([
                "title" => "required",
                "content" => "required",
            ], [
                "title.required" => "Le titre est obligatoire",
                "content.required" => "Le contenu est obligatoire",
            ]);

            Page::updateOrCreate(
                ["code" => $code],
                $validatedData
            );

            return redirect()->back();
        }

        if ($page) {
            return view("livewire.backoffice.pages.mot-d-g", ["page" => $page]);
        }

        return view("livewire.backoffice.pages.mot-d-g");
    }

    public function organigramme(Request $request, $code = "organigramme")
    {
        $page = Page::where("code", $code)->first();

        if ($request->isMethod("post")) {
            $validatedData = $request->validate([
                "title" => "required",
                "content" => "required",
            ], [
                "title.required" => "Le titre est obligatoire",
                "content.required" => "Le contenu est obligatoire",
            ]);

            Page::updateOrCreate(
                ["code" => $code],
                $validatedData
            );

            return redirect()->back();
        }

        if ($page) {
            return view("livewire.backoffice.pages.organigramme", [
                "page" => $page
            ]);
        }

        return view("livewire.backoffice.pages.organigramme");
    }

    public function planStrategique(Request $request, $code = "plan-strategique")
    {
        $page = Page::where("code", $code)->first();

        if ($request->isMethod("post")) {
            $validatedData = $request->validate([
                "title" => "required",
                "content" => "required",
            ], [
                "title.required" => "Le titre est obligatoire",
                "content.required" => "Le contenu est obligatoire",
            ]);

            Page::updateOrCreate(
                ["code" => $code],
                $validatedData
            );

            return redirect()->back();
        }

        if ($page) {
            return view("livewire.backoffice.pages.plan-strategique", ["page" => $page]);
        }

        return view("livewire.backoffice.pages.plan-strategique");
    }

    public function missions(Request $request, $code = "missions")
    {
        $page = Page::where("code", $code)->first();

        if ($request->isMethod("post")) {
            $validatedData = $request->validate([
                "title" => "required",
                "content" => "required",
            ], [
                "title.required" => "Le titre est obligatoire",
                "content.required" => "Le contenu est obligatoire",
            ]);

            Page::updateOrCreate(
                ["code" => $code],
                $validatedData
            );

            return redirect()->back();
        }

        if ($page) {
            return view("livewire.backoffice.pages.missions", ["page" => $page]);
        }

        return view("livewire.backoffice.pages.missions");
    }

    public function informationUtile(Request $request, $code = "information-utile")
    {
        $page = Page::where("code", $code)->first();

        if ($request->isMethod("post")) {
            $validatedData = $request->validate([
                "title" => "required",
                "content" => "required",
            ], [
                "title.required" => "Le titre est obligatoire",
                "content.required" => "Le contenu est obligatoire",
            ]);

            Page::updateOrCreate(
                ["code" => $code],
                $validatedData
            );

            return redirect()->back();
        }

        if ($page) {
            return view("livewire.backoffice.pages.information-utile", ["page" => $page]);
        }

        return view("livewire.backoffice.pages.information-utile");
    }
}

