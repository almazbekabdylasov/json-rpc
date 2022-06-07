import Server from './server'

export class Issues {
  async getForms() {
    const res = await Server.post(
      'http://localhost:8000/api/v1/forms',
      {
        jsonrpc: '2.0',
        id: 1,
        method: 'forms@index',
      },
      {
        headers: {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*',
        },
      }
    )
    return res
  }
  async getForm(id) {
    const res = await Server.post(
      'http://localhost:8000/api/v1/forms',
      {
        jsonrpc: '2.0',
        id: 1,
        method: 'forms@show',
        params: { form_uid: id },
      },
      {
        headers: {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*',
        },
      }
    )
    return res
  }
  async saveForm(data, id) {
    console.log(data)
    const res = await Server.post(
      'http://localhost:8000/api/v1/answers',
      {
        jsonrpc: '2.0',
        id: 1,
        method: 'answers@store',
        params: { answers: data, form_uid: id },
      },
      {
        headers: {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*',
        },
      }
    )
    return res
  }
  async getAnswer(id) {
    const res = await Server.post(
      'http://localhost:8000/api/v1/answers',
      {
        jsonrpc: '2.0',
        id: 1,
        method: 'answers@show',
        params: { form_uid: id },
      },
      {
        headers: {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*',
        },
      }
    )
    return res
  }
}
