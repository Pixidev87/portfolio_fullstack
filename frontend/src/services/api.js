import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost:8000/api/v1',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    }
})

export const getProjects = () => api.get('/projects');
export const getProject = (slug) => api.get(`/project/${slug}`);
export const sendMessage = (data) => api.post('/messages', data);