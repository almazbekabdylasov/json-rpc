import axios from 'axios'

const defaultHeaders = {
  'Content-type': 'application/json',
}

const instance = axios.create({
  headers: defaultHeaders,
})

export default instance
