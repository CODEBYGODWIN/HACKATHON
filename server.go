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
	Title      string
	Theme      string
	Content    string
	Background string
	Link       string
}

func main() {
	var data MiniSiteData
	http.HandleFunc("/", showForm)
	http.HandleFunc("/generate", func(w http.ResponseWriter, r *http.Request) {
		data = generateMiniSite(w, r)
	})
	http.HandleFunc("/result", showResult)
	http.Handle("/static/", http.StripPrefix("/static/", http.FileServer(http.Dir("static"))))
	http.HandleFunc("/code", func(w http.ResponseWriter, r *http.Request) {
		code(w, r, data)
	})

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
	tmpl.Execute(w, nil)
}

func generateMiniSite(w http.ResponseWriter, r *http.Request) (MiniSiteData){
	err := r.ParseForm()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		os.Exit(1)
	}

	theme := r.FormValue("theme")
	content := r.FormValue("content")
	backgroundHex := r.FormValue("background")
	link := r.FormValue("link")
	title := r.FormValue("title")

	backgroundRGBA := hexToRGBA(backgroundHex)

	generationResult := "Mini-site généré avec le thème : " + theme + ", le contenu : " + content + ", et le fond : " + backgroundHex
	fmt.Println(generationResult)

	sessionColor = backgroundRGBA

	tmpl, err := template.ParseFiles("templates/result.html")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		os.Exit(1)
	}

	data := MiniSiteData{
		Title:      title,
		Theme:      theme,
		Content:    content,
		Background: sessionColor,
		Link: link,
	}

	fmt.Println(data)

		

	tmpl.Execute(w, data)

	return data

}

func showResult(w http.ResponseWriter, r *http.Request) {
	tmpl, err := template.ParseFiles("templates/result.html")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}



	tmpl.Execute(w, nil)
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

func code(w http.ResponseWriter, r *http.Request, data MiniSiteData) {
	tmpl, err := template.ParseFiles("templates/code.html")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	tmpl.Execute(w, data)
}