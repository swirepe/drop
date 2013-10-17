package main

import ( "io/ioutil"
        "net"
        "fmt"
        "strings"
        "os" 
        "math/rand"
        "bytes")

func initList() (*[]string) {
    content, err := ioutil.ReadFile("/usr/share/token/words.txt")
    if err != nil {
        //Do something
        fmt.Printf("Error reading file /usr/share/token/words.txt\n")
        os.Exit(1)
    }
    lines := strings.Split(string(content), "\n")
    return &lines
        
}

func makeKey(buffer *bytes.Buffer, lines *[]string) {
    (*buffer).WriteString( (*lines)[ rand.Intn( len(*lines) ) ] )
    (*buffer).WriteString("-")
    (*buffer).WriteString( (*lines)[ rand.Intn( len(*lines) ) ] )
    (*buffer).WriteString("-")
    (*buffer).WriteString( (*lines)[ rand.Intn( len(*lines) ) ] )
    (*buffer).WriteString("-")
    (*buffer).WriteString( (*lines)[ rand.Intn( len(*lines) ) ] )
}


func handleConnection(conn net.Conn, lines *[]string) {
    var buffer bytes.Buffer
    
    makeKey(&buffer, lines)   

    conn.Write(buffer.Bytes())
    conn.Close()
}


func main(){
    lines := initList()
        
    ln, err := net.Listen("tcp", ":32774")
    if err != nil {
        // handle error
        fmt.Printf("Error listening on port 32774\n")
        os.Exit(1)
    }

    for {
        conn, err := ln.Accept()
        if err != nil {
            // handle error
            continue
        }
        go handleConnection(conn, lines)
    }
}

