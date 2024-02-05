package main

import (
	"fmt"
	"html/template"
	"net/http"
	"os"
	"regexp"
	"strconv"
	"strings"
)

var sessionColor string

type MiniSiteData struct {
	Theme      string
	Content    string
	Background string
}

type PageData struct {
	Title      string
	MiniSite   MiniSiteData
	Generated  bool
	Generation string
}

func main() {
	http.HandleFunc("/", showForm)
	http.HandleFunc("/generate", generateMiniSite)
	http.HandleFunc("/result", showResult)
	http.Handle("/static/", http.StripPrefix("/static/", http.FileServer(http.Dir("static"))))

	port := os.Getenv("PORT")
	if port == "" {
		port = "8080"
	}

	fmt.Println("Server is running on port", port)
	http.ListenAndServe(":"+port, nil)
}

func showForm(w http.ResponseWriter, r *http.Request) {
	tmpl, err := template.ParseFiles("templates/form.html")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	data := PageData{
		Title: "Créateur de Mini-Sites",
	}

	tmpl.Execute(w, data)
}

func generateMiniSite(w http.ResponseWriter, r *http.Request) {
	err := r.ParseForm()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	theme := r.FormValue("theme")
	content := r.FormValue("content")
	backgroundHex := r.FormValue("background")

	backgroundRGBA := hexToRGBA(backgroundHex)

	generationResult := "Mini-site généré avec le thème : " + theme + ", le contenu : " + content + ", et le fond : " + backgroundHex
	fmt.Println(generationResult)

	sessionColor = backgroundRGBA

	redirectURL := "/result"
	http.Redirect(w, r, redirectURL, http.StatusSeeOther)

}

func showResult(w http.ResponseWriter, r *http.Request) {
	tmpl, err := template.ParseFiles("templates/result.html")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	data := PageData{
		Title:      "Résultat de la Génération",
		Generated:  true,
		Generation: "Mini-site généré",
		MiniSite: MiniSiteData{
			Background: sessionColor,
		},
	}

	tmpl.Execute(w, data)
}

func hexToRGBA(hex string) string {
	if match, _ := regexp.MatchString("^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$", hex); !match {
		return "rgba(255, 255, 255, 1)"
	}

	hex = strings.TrimPrefix(hex, "#")
	var r, g, b string
	if len(hex) == 3 {
		r = string(hex[0]) + string(hex[0])
		g = string(hex[1]) + string(hex[1])
		b = string(hex[2]) + string(hex[2])
	} else {
		r = string(hex[0]) + string(hex[1])
		g = string(hex[2]) + string(hex[3])
		b = string(hex[4]) + string(hex[5])
	}
	decimalR, _ := strconv.ParseInt(r, 16, 64)
	decimalG, _ := strconv.ParseInt(g, 16, 64)
	decimalB, _ := strconv.ParseInt(b, 16, 64)

	return fmt.Sprintf("rgba(%d, %d, %d, 1)", decimalR, decimalG, decimalB)
}
