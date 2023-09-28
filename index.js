let username = document.querySelector('#username'),
    age = document.querySelector('#age')

const user = {
    "username": username.value,
    "age": age.value
}

// const insertFormData = new FormData(document.querySelector('#form-1'))

const insertData = async () => {

    document.querySelector('#form-1-submit').value = `Loading...`

    await fetch('includes/insert-data.php', {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/json; charset=utf-8'
        },
        'body': JSON.stringify({
            "username": username.value,
            "age": age.value
        })
    })
    .then(async res => await res.json())
    .then(data => {
        document.querySelector('#form-1-submit').value = `Submit`
        console.log(data.msg)
        selectData()
    })
    .catch(err => console.error(err))
}


const selectData = async () => {

    let tr = ''

    document.querySelector('#table-data').innerHTML = 'Loading...'

    await fetch('includes/select-data.php', {
        'method': 'GET',
        'headers': {
            'Content-Type': 'application/json; charset=utf-8'
        }
    })
    .then(async res => await res.json())
    .then(data => {
        if (data.empty === 'empty') {
            tr = `<tr>Data Not Found.</tr>`
        } else {
            data.map(row => {
                tr += `<tr>
                    <td>${row.id}</td>
                    <td>${row.username}</td>
                    <td>${row.age}</td>
                    <td><button onclick="editData(${row.id})">Edit</button></td>
                    <td><button onclick="removeData(${row.id})">Remove</button></td>
                </tr>`
            })

        }
        
        document.querySelector('#table-data').innerHTML = tr
    })
    .catch(err => console.error(err))
}

document.querySelector('#form-1-submit').addEventListener('click', (e) => {
    e.preventDefault()
    insertData()
    selectData()
})

selectData()

let ID = 0

const editData = async id => {
    ID = id

    await fetch(`includes/edit-data.php?id=${ID}`, {
        'method': 'GET',
        'headers': {
            'Content-Type': 'application/json; charset=utf-8'
        }
    })
    .then(async res => await res.json())
    .then(data => {
        console.log(data)
        username.value = data[0].username
        age.value = data[0].age
    })
    .catch(err => console.error(err))
}

const updateData = async () => {
    await fetch('includes/update-data.php', {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/json'
        },
        'body': JSON.stringify({
            "id": ID,
            "username": username.value,
            "age": age.value
        })
    })
    .then(async res => await res.json())
    .then(data => {
        document.querySelector('.msg').innerText = data.msg
        selectData()
        username.value = ``
        age.value = ``
    })
    .catch(err => console.error(err))
}

document.querySelector('#form-1-update').addEventListener('click', (e) => {
    e.preventDefault()
    updateData()
})

const removeData = async id => {
    await fetch(`includes/remove-data.php?id=${id}`, {
        'method': 'GET'
    })
    .then(res => res.json())
    .then(data => {
        document.querySelector('.msg').innerText = data.msg
        console.log(data)
        selectData()
    })
    .catch(err => console.error(err))
}