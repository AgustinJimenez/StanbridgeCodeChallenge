<!-- eslint-disable vue/no-v-text-v-html-on-component -->
<script lang="tsx">
import { StatusCodes } from 'http-status-codes'
import { AttendanceStatusOptions, type StudentType, AttendanceSatusTypes } from '../types'
import { toast } from 'vue3-toastify'

type DataType = {
  students: StudentType[]
  courseAttendance: any[]
  attendancesStatusOptions: any[]
}
const COURSE_ID = 1
export default {
  created() {},
  data(): DataType {
    return {
      students: [],
      courseAttendance: [],
      attendancesStatusOptions: AttendanceStatusOptions
    }
  },
  mounted() {
    this.fetchData()
  },
  methods: {
    async fetchData() {
      let response = await this.axios.get('students')
      if (response.status === StatusCodes.OK) {
        this.students = response.data
      }
      response = await this.axios.get('attendance', {
        params: {
          course_id: COURSE_ID
        }
      })
      if (response.status === StatusCodes.OK) {
        this.courseAttendance = response.data
      }
    },
    getStudentAttendanceStatus(id: any) {
      const ca = this.courseAttendance.find(({ student_id }: any) => student_id === id)
      return ca?.status
    },
    getFullName(student: any) {
      return `${student.last_name} ${student.first_name}`
    },
    getStudentStatusColor(id: number) {
      const status = this.getStudentAttendanceStatus(id)
      let color = ''
      switch (status) {
        case AttendanceSatusTypes.Absent:
          color = 'red-darken-2'
          break

        case AttendanceSatusTypes.Present:
          color = 'green-darken-2'
          break

        default:
          color = 'grey-darken-2'
          break
      }
      return color
    },
    async changeStudentAttendanceStatus(id: any, value: any) {
      if (!value) return

      let response = await this.axios.post('attendance', {
        course_id: COURSE_ID,
        student_id: id,
        status: value
      })

      if (response.status !== StatusCodes.OK) return

      const newAttendance = response.data

      if (this.courseAttendance.find((ca) => ca.id === newAttendance.id)) {
        this.courseAttendance = this.courseAttendance.map((ca) => {
          if (ca.id === newAttendance.id) ca = newAttendance
          return ca
        })
      } else this.courseAttendance.push(newAttendance)
      toast.success('Attendance updated correctly.')
    }
  }
}
</script>

<template>
  <main>
    <v-container class="spacing-playground pa-6" fluid>
      <v-table>
        <thead>
          <tr>
            <th class="text-left">Last Name</th>
            <th class="text-left">First Name</th>
            <th class="text-left">Email</th>
            <th class="text-left">Attendance Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="student in students" :key="student.id">
            <td>{{ student.last_name }}</td>
            <td>{{ student.first_name }}</td>
            <td>{{ student.email }}</td>
            <td>
              <v-menu>
                <template v-slot:activator="{ props }">
                  <v-btn :color="getStudentStatusColor(student.id)" v-bind="props">
                    {{ getStudentAttendanceStatus(student.id) || 'None' }}
                  </v-btn>
                </template>

                <v-list>
                  <v-list-item
                    v-for="opt in attendancesStatusOptions"
                    :key="opt.value"
                    :value="opt.value"
                    color="primary"
                    @click="changeStudentAttendanceStatus(student.id, opt.value)"
                  >
                    <v-list-item-title>
                      {{ opt.title }}
                    </v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-container>
  </main>
</template>
