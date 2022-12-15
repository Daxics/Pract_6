async function deleteFile(id) {
  const res = await fetch(`http://localhost:8080/api/files/${id}`, {
    method: 'DELETE'
  });

  const data = await res.json();
  if (data.status === true) {
    location.reload();
  }
}