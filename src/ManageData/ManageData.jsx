import React, { useState, useEffect } from "react";
import axios from "axios";

const ManageData = () => {
  const [data, setData] = useState([]);
  const [form, setForm] = useState({
    name: "",
    course: "",
    score: 0,
  });
  const [editingId, setEditingId] = useState(null);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    const fetchData = async () => {
      setLoading(true);
      try {
        const response = await axios.get(
          "https://6678f9f40bd45250562081d9.mockapi.io/api/student-score"
        );
        setData(response.data);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
      setLoading(false);
    };

    fetchData();
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!form.name || !form.course || form.score < 0) {
      alert("Semua field harus diisi dengan benar!");
      return;
    }

    try {
      if (editingId) {
        const response = await axios.put(
          `https://6678f9f40bd45250562081d9.mockapi.io/api/student-score/${editingId}`,
          form
        );
        setData(data.map((item) => (item.id === editingId ? response.data : item)));
        setEditingId(null);
      } else {
        const response = await axios.post(
          "https://6678f9f40bd45250562081d9.mockapi.io/api/student-score",
          form
        );
        setData([...data, response.data]);
      }

      setForm({ name: "", course: "", score: 0 });
    } catch (error) {
      console.error("Error submitting data:", error);
    }
  };

  const handleDelete = async (id) => {
    if (!window.confirm("Yakin ingin menghapus data ini?")) return;
    try {
      await axios.delete(
        `https://6678f9f40bd45250562081d9.mockapi.io/api/student-score/${id}`
      );
      setData(data.filter((item) => item.id !== id));
    } catch (error) {
      console.error("Error deleting data:", error);
    }
  };

  const handleEdit = (item) => {
    setForm({ name: item.name, course: item.course, score: item.score });
    setEditingId(item.id);
  };

  const calculateGrade = (score) => {
    if (score >= 80) return "A";
    else if (score >= 70 && score < 80) return "B";
    else if (score >= 60 && score < 70) return "C";
    else if (score >= 50 && score < 60) return "D";
    else return "E";
  };

  return (
    <div className="p-6 max-w-screen-lg mx-auto">
      {/* Loading Indicator */}
      {loading ? (
        <p className="text-center text-gray-700">Loading data...</p>
      ) : (
        <>
          {/* Table */}
          <table className="table-auto w-full border-collapse border border-gray-300 mb-6 shadow-lg rounded-lg">
            <thead className="bg-purple-600 text-white text-sm">
              <tr>
                <th className="border border-gray-300 px-4 py-2">No</th>
                <th className="border border-gray-300 px-4 py-2">Nama</th>
                <th className="border border-gray-300 px-4 py-2">Mata Kuliah</th>
                <th className="border border-gray-300 px-4 py-2">Nilai</th>
                <th className="border border-gray-300 px-4 py-2">Index Nilai</th>
                <th className="border border-gray-300 px-4 py-2">Action</th>
              </tr>
            </thead>
            <tbody>
              {data.map((item, index) => (
                <tr
                  key={item.id}
                  className={`text-center text-sm ${
                    index % 2 === 0 ? "bg-gray-100" : "bg-white"
                  } hover:bg-gray-200`}
                >
                  <td className="border border-gray-300 px-4 py-2">{index + 1}</td>
                  <td className="border border-gray-300 px-4 py-2">{item.name}</td>
                  <td className="border border-gray-300 px-4 py-2">{item.course}</td>
                  <td className="border border-gray-300 px-4 py-2">{item.score}</td>
                  <td className="border border-gray-300 px-4 py-2">{calculateGrade(item.score)}</td>
                  <td className="border border-gray-300 px-4 py-2">
                    <div className="flex justify-center space-x-2">
                      <button
                        className="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-200"
                        onClick={() => handleEdit(item)}
                      >
                        Update
                      </button>
                      <button
                        className="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-200"
                        onClick={() => handleDelete(item.id)}
                      >
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>

          {/* Form */}
          <form onSubmit={handleSubmit} className="w-full max-w-md mx-auto bg-white p-6 shadow-md rounded-lg">
            <div className="mb-4">
              <label className="block text-gray-700 font-bold mb-2">Name:</label>
              <input
                type="text"
                className="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                value={form.name}
                onChange={(e) => setForm({ ...form, name: e.target.value })}
                required
              />
            </div>

            <div className="mb-4">
              <label className="block text-gray-700 font-bold mb-2">Mata Kuliah:</label>
              <input
                type="text"
                className="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                value={form.course}
                onChange={(e) => setForm({ ...form, course: e.target.value })}
                required
              />
            </div>

            <div className="mb-4">
              <label className="block text-gray-700 font-bold mb-2">Nilai:</label>
              <input
                type="number"
                className="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                value={form.score}
                onChange={(e) =>
                  setForm({ ...form, score: parseInt(e.target.value || 0) })
                }
                required
              />
            </div>

            <button
              type="submit"
              className="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition duration-200 w-full"
            >
              {editingId ? "Update" : "Submit"}
            </button>
          </form>
        </>
      )}
    </div>
  );
};

export default ManageData;